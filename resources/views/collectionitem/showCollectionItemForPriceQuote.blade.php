<div class="col-sm-10 col-sm-offset-1 col-md-offset-1 col-md-10 marginBottom25">
    <div class="form-group">
        <label for="messageBody"></label>
        <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
        <div style="border:1px solid white;" class="img-contact-pg">
           <input form="contactForm" type="hidden" id="collectionItem" name="collectionItemId"
                   value="{{$collectionItem->id}}">
            <img src="{{ asset('images/collectionitem/'. $collectionItem->image) }}"
                 alt="{{ $collectionItem->image }}" height="220" width="240"/>
            <span class='img-price-quot'>{{$collectionItem->title}} </span>
            <p>{{$collectionItem->code_number}} </p>
        </div>
        </div>
        <br>
        <small class="text-danger">{{ $errors->first('messageBody') }}</small>
    </div>
</div>