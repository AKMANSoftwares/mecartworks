<div id="main" >
  <div class="col-md-12 col-sm-12" v-if="showdata == ''">
    @foreach ($materials as $key => $material)
      @foreach($material->color as $key=>$color)
        @foreach ($material->size as $size)
          <div class="col-md-2 col-sm-2 col-xs-3">
            <div class="txt-image-color" >
                <img src="{{ asset('images/materials/colors/'.$color->pivot->image)}}" alt="{{ $color->pivot->image }}" style="width:100%;">
                <p id="value" >
                   {{ $color->name }} {{ '(' }}{{ current(explode('-',$size->size)) }} {{ ')' }}
                </p>
            </div>
          </div>
        @endforeach
      @endforeach
    @endforeach
  </div>
  <div class="col-md-12" v-else-if="showdata == 'material'">
    <div v-for="material of materials" v-if="material.id == materialId">
        <div  v-for="sizes in material.size">
          <div  class="col-md-2 col-xs-3"  v-for="color in material.color">
            <img :src= "'/images/materials/colors/'+  color.pivot.image" style="width:100%"/>
            <p class="txt-image-color">
              @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
            </p>
          </div>
        </div>
    </div>
  </div>
  <div class="col-md-12" v-else-if="showdata=='size'">
    <div v-for="material in materials">
      <div v-for='sizes in material.size' v-if="sizes.id == sizeId">
        <div class="col-md-2 col-xs-3" v-for="color in material.color">
          <img :src="'images/materials/colors/'+ color.pivot.image" style="width:100%"  />
          <p class="txt-image-color">
            @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
          </p>
        </div>
      </div>
      <div v-else></div>
    </div>
  </div>
  <div class = "col-md-12" v-else-if="showdata=='size-color'">
    <div v-for="material in materials">
      <div v-for = 'sizes in material.size' v-if='sizes.id == sizeId'>
        <div class="col-md-2 col-xs-3" v-for="color in material.color" v-if='color.id == colorId'>
          <img :src="'images/materials/colors/'+ color.pivot.image" alt="" style="width:100%" />
          <p class="txt-image-color">
            @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
          </p>
        </div>
        <div v-else></div>
      </div>
      <div v-else></div>
    </div>
  </div>
  <div class = "col-md-12" v-else-if="showdata=='color-size'">
    <div v-for="material in materials">
      <div v-for = 'sizes in material.size' v-if='sizes.id == sizeId'>
        <div class="col-md-2 col-xs-3" v-for="color in material.color" v-if='color.id == colorId'>
          <img :src="'images/materials/colors/'+ color.pivot.image" alt="" style="width:100%" />
          <p class="txt-image-color">
            @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
          </p>
        </div>
        <div v-else></div>
      </div>
      <div v-else></div>
    </div>
  </div>
  <div class="col-md-12" v-else-if="showdata =='color' ">
    <div v-for = "material in materials">
      <div v-for='sizes in material.size'>
        <div class="col-md-2 col-xs-3" v-for ="color in material.color" v-if="color.id == colorId">
          <img :src="'images/materials/colors/'+ color.pivot.image" alt="" style="width:100%" />
          <p class="txt-image-color">
            @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
          </p>
        </div>
        <div v-else></div>
      </div>
    </div>
  </div>
  <div class = "col-md-12" v-else-if = "showdata == 'material-size' ">
    <div v-for = "material in materials" v-if="material.id == materialId">
      <div v-for="sizes in material.size" v-if="sizes.id == sizeId ">
        <div class="col-md-2 col-xs-3" v-for = "color in material.color">
          <img :src="'images/materials/colors/'+ color.pivot.image" alt="" style="width:100%"  />
          <p class="txt-image-color">
            @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
          </p>
        </div>
      </div>
      <div v-else></div>
    </div>
    <div v-else></div>
  </div>
  <div v-else-if="showdata == 'material-color'" >
    <div v-for = "material in materials" v-if = "material.id == materialId">
      <div v-for = "sizes in material.size">
        <div class="col-md-2 col-xs-3" v-for = "color in material.color" v-if="color.id == colorId">
          <img :src="'images/materials/colors/'+ color.pivot.image" alt=""  style="width:100%"  />
          <p class="txt-image-color">
            @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
          </p>
        </div>
        <div v-else></div>
      </div>
    </div>
    <div v-else></div>
  </div>
  <div v-else-if ="showdata == 'material-size-color'">
    <div v-for ="material in materials" v-if ="material.id == materialId">
      <div v-for = "sizes in material.size" v-if ="sizes.id == sizeId">
        <div class="col-md-2 col-xs-3" v-for="color in material.color " v-if ="color.id == colorId">
          <img :src="'images/materials/colors/'+ color.pivot.image" alt="" style="width:100%"  />
          <p class="txt-image-color">
            @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
          </p>
        </div>
        <div v-else></div>
        </div>
        <div v-else></div>
      </div>
      <div v-else></div>
    </div>
    <div v-else="showdata == 'material-color-size'">
      <div v-for ="material in materials" v-if ="material.id == materialId">
        <div v-for = "sizes in material.size" v-if ="sizes.id == sizeId">
          <div class="col-md-2 col-xs-3" v-for="color in material.color " v-if ="color.id == colorId">
            <img :src="'images/materials/colors/'+ color.pivot.image" alt="" style="width:100%"  />
            <p class="txt-image-color">
              @{{ color.name }}{{ '(' }}@{{ sizes.size.split('-')[0] }}{{ ')' }}
            </p>
          </div>
          <div v-else></div>
          </div>
          <div v-else></div>
        </div>
        <div v-else></div>
      </div>
</div>
