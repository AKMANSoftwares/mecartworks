<?php

namespace Mec\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Mec\Models\CollectionItem;
use Mec\Models\FileUpload;
use Mec\Models\Pixel;
use Mec\Models\PixelImage;
use Newsletter;

class ContactController extends Controller {
	public function newCustomProject() {
		$time = date("d-m-Y");
		$microTime = explode(" ", microtime());
		$timeStamp = $time . '-' . $microTime[0];
		$newCustomProject = true;

		return view('contact',
			[
				'timeStamp' => $timeStamp,
				'newCustomProject' => $newCustomProject,
			]);
	}
	public function getPriceQuoteForPixelImage($pixelImageId) {

		$pixelImage = PixelImage::find($pixelImageId);
		$pixelid = $pixelImage->pixel_id;
		$pixel = Pixel::find($pixelImage->pixel_id);

		$time = date("d-m-Y");
		$microTime = explode(" ", microtime());
		$timeStamp = $time . '-' . $microTime[0];

		return view('contact',
			[
				'timeStamp' => $timeStamp,
				'pixelImage' => $pixelImage,
				'pixel' => $pixel,
			]);
	}
	public function getPriceQuote($collectionItemId) {

		$collectionItem = CollectionItem::find($collectionItemId);
		$time = date("d-m-Y");
		$microTime = explode(" ", microtime());
		$timeStamp = $time . '-' . $microTime[0];

		return view('contact',
			[
				'timeStamp' => $timeStamp,
				'collectionItem' => $collectionItem,
			]);
	}

	public function uploadFiles(Request $request) {

		$timeStamp = $request->timeStamp;
		$targetDir = public_path('uploads/');
		$fileName = $_FILES['file']['name'];
		$targetFile = $targetDir . $request->timeStamp . "_" . $fileName;
		$timeStampWithFileName = $request->timeStamp . "_" . $fileName;

		move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);

		$fileUpload = new FileUpload();

		$fileUpload->fileName = $fileName;
		$fileUpload->timeStamp = $timeStamp;
		$fileUpload->timeStampWithName = $timeStampWithFileName;
		$fileUpload->save();
	}

	public function getcontact() {
		$time = date("d-m-Y");
		$microTime = explode(" ", microtime());
		$timeStamp = $time . '-' . $microTime[0];

		return view('contact',

			[
				'timeStamp' => $timeStamp,
			]);
	}

	public function postMessage(Request $request) {

		$data = Input::all();
		$validator = $this->validateForm($data);

		if ($validator) {
			return Redirect::to('/contact')->withInput()->withErrors($validator);
		} else {

			$name = $request->firstName . ' ' . $request->lastName;
			$email = $request->email;
			$country = $request->country;
			$messageBody = $request->messageBody;
			$timeStamp = $request->timeStamp;

			$filesToBeSend = FileUpload::where('timeStamp', $timeStamp)->get();

			$location = null;
			$fileLocations = array();
			$fileLocation = null;
			$collectionItemId = null;
			$pixelImageId = null;
			$phone = null;
			$customerType = null;
			$newCustomProject = null;
			if (isset($request->pixelImageId)) {
				$pixelImageId = $request->pixelImageId;
			}
			if (isset($request->collectionItemId)) {
				$collectionItemId = $request->collectionItemId;
			}
			if (isset($request->phone)) {
				$phone = $request->phone;

			}
			if (isset($request->customerType)) {
				$customerType = $request->customerType;
			}
			if (isset($request->newCustomProject)) {
				$newCustomProject = $request->newCustomProject;
			}

			if (isset($request->subscribe)) {
				$country = null;
				$profession = null;
				$phone = null;
				if (isset($request->country)) {
					$country = $request->country;
				}
				if (isset($request->customerType)) {
					$profession = $request->customerType;
				}

				if (isset($request->phone)) {
					$phone = $request->phone;
				}
				Newsletter::subscribeOrUpdate($request->email,
					[
						'FNAME' => $request->firstName,
						'LNAME' => $request->lastName,
						'PROFESSION' => $profession,
						'COUNTRY' => $country,
						'PHONE' => $phone,
					]);
			}
			if (count($filesToBeSend) > 0) {
				foreach ($filesToBeSend as $file) {

					$timeStampWithFileName = $file->timeStampWithName;
					$fileLocation = public_path('uploads/' . $timeStampWithFileName);
					array_push($fileLocations, $fileLocation);
				}
			}
			$data = array($name, $email, $country, $messageBody, $fileLocations, $collectionItemId, $phone, $customerType, $newCustomProject, $pixelImageId);

			$this->sendMessage($data);

			foreach ($filesToBeSend as $file) {
				unlink(public_path('uploads/' . $file->timeStampWithName));
				$file->delete();
			}

			$notification = array(
				'message' => 'Thank you for contacting us. We will be in touch shortly.',
				'alert-type' => 'success',
			);
			return redirect()
				->back()
				->with($notification);
		}
	}

	public function validateForm($data) {
//        $rules = array(
		//
		//            'name' => 'required|regex:/^[A-Za-z][A-Za-z0-9\s]*([A-Za-z0-9]+)*$/',
		//            'email' => 'required|email',
		//            'messageBody' => 'required',
		//            'g-recaptcha-response' => 'required|captcha',
		//        );

		//  $validator = Validator::make($data, $rules);
		return false;
		// return $validator;
	}

	public function sendMessage($data) {
		$name = $data[0];
		$email = $data[1];
		$country = $data[2];
		$messageBody = $data[3];
		$files = $data[4];
		$collectionItemId = $data[5];
		$phone = $data[6];
		$customerType = $data[7];
		$newCustomProject = $data[8];
		$collectionItemLocation = null;
		$collectionItemTitle = null;
		$collectionItemCode = null;
		$pixelImageId = $data[9];

		if (isset($pixelImageId)) {

			$pixelImage = PixelImage::find($pixelImageId);
			$pixel = Pixel::find($pixelImage->pixel_id);

			$collectionItemLocation = public_path('images/collectionitem/' . $pixelImage->image);
			$collectionItemTitle = $pixel->title;
			$collectionItemCode = $pixel->code_number;

		}
		if (isset($collectionItemId)) {

			$collectionItem = CollectionItem::find($collectionItemId);
			$collectionItemLocation = public_path('images/collectionitem/' . $collectionItem->image);
			$collectionItemTitle = $collectionItem->title;
			$collectionItemCode = $collectionItem->code_number;
		}

		Mail::send('emails.contactUsMessagePost',
			[
				'name' => $name, 'email' => $email,
				'country' => $country,
				'messageBody' => $messageBody,
				'collectionItemTitle' => $collectionItemTitle,
				'collectionItemCode' => $collectionItemCode,
				'phone' => $phone,
				'customerType' => $customerType,
				'newCustomProject' => $newCustomProject,
			],
			function ($message) use ($files, $collectionItemLocation) {

				$message->from(env('MAIL_TO_ADDRESS'));
				$message->to(env('MAIL_TO_ADDRESS'));

				if (count($files) > 0) {
					foreach ($files as $file) {
						$message->attach($file);
					}
				}
				if (isset($collectionItemLocation)) {
					$message->attach($collectionItemLocation);
				}
			});
	}
	public function subscribeUserToMailList(Request $request) {

		Newsletter::subscribeOrUpdate($request->email);
		$notification = array(
			'message' => 'You have Subscribed Successfuly',
			'alert-type' => 'success',
		);

		return response()->json(
			[
				'notification' => $notification,
			]);
	}
}
