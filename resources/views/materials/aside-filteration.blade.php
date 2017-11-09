<aside>
   <div>
       <div class=" browse-txt" >
        <div class="col-sm-4 col-xs-4 col-md-12 col-lg-12">
            <h4>BROWSE BY</h4>
            <div class="vertical-menu">
                <h5>TILE TYPE</h5>
                {{--<a href="" class="aside-active txt-title">TILE TYPE</a>--}}
                <span v-for="material in materials">
      <a  :id="material.id"
         @click="show('material'),selectmaterial($event),setActive(material.name)"
         :class="{ active: isActive(material.name) }" v-if="material.name">@{{ material.name}}</a>
        </span>
            </div>
        </div>
    </div>
    <div class="browse-txt">
        <div class="col-sm-4 col-xs-4 col-md-12 col-lg-12">
            <div class="vertical-menu">
                {{--<a href="" class="aside-active">SIZE</a>--}}
                <h5>SIZE</h5>
                <span v-for="size in sizes">
        <a  :id="size.id" @click="show('size'),selectsize($event),setsizeActive(size.size)"
           :class="{active: issizeActive(size.size)}">@{{ size.size }}</a>
        </span>
            </div>
        </div>
    </div>
     <div class="browse-txt">
        <div class="col-sm-4 col-xs-4 col-md-12 col-lg-12 ">
            <div class="vertical-menu">
                {{--<a href="" class="aside-active">COLOR</a>--}}
                <h5>COLOR</h5>
                <span v-for="color in colors" style="width: 100px;position: relative;right:20px;margin-right: 5px;margin-bottom: 2px;" class="aside-color-align">
      <img :src="'/images/materials/general_colors/'+ color.image" :id="color.id"
           @click="show('color'),selectcolor($event),setcolorActive(color.image)"
           :class="{active : iscolorActive(color.image)}" width="25px" height="25px;" style="margin-top:3px;"
           class="color-image"/>
      </span>
            </div>
        </div>
    </div>
   </div>
    <div class="row">
        <div class=" col-md-11 col-md-offset-1 col-sm-8 col-sm-4 col-xs-8 col-xs-offset-4">
            <div class="vertical-menu-filter" >
                @include('materials.active-filters')
            </div>
        </div>
    </div>
</aside>
