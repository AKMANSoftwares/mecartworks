<div class="col-sm-10 col-sm-offset-1 col-md-offset-1 col-md-10">
    <div class="form-group">
        <label for="messageBody">Pixel Image</label>
        <div class="col-sm-12 col-xs-12">
            <input form="contactForm" type="hidden" id="pixelImageId" name="pixelImageId"
                   value="{{$pixelImage->id}}">
            <img src="{{ asset('images/collectionitem/'. $pixelImage->image) }}"
                 alt="{{ $pixelImage->image }}" height="220" width="240"/>
            <span class='item-title-h2'>{{$pixelImage->collectionitemiamge->title}} </span>
            {{$pixelImage->collectionitemiamge->code_number}}
        </div>
        <br>
        <small class="text-danger">{{ $errors->first('messageBody') }}</small>
    </div>
</div>