
  <div style="position: relative;right:30px;top:10px;margin-bottom: 40px;">
    <a  class="aside-active anchr-border" >ACTIVE FILTERS</a>
    <a v-if="showdata=='material'" class="anchr-border">
      <span v-for="material in materials" v-if="material.id == materialId">@{{ material.name }}</span>
      <span v-else></span>
    </a>
    <a v-else-if="showdata =='size'" >
      <span v-for="size in sizes" v-if="size.id ==sizeId" class="anchr-border">@{{ size.size }}</span>

    </a>
    <a v-else-if="showdata =='color'">
      <span v-for ="color in colors" v-if="color.id == colorId" class="anchr-border">@{{ color.name }}</span>

    </a>
    <a v-else-if="showdata == 'material-color'" >
      <span v-for="color in colors" v-if="color.id == colorId" class="anchr-border">@{{ color.name }}</span>
      <span v-for="material in materials" v-if="material.id == materialId" class="anchr-border">@{{ material.name }}</span>
    </a>
    <a v-else-if="showdata == 'material-size'">
      <span v-for="size in sizes" v-if="size.id == sizeId" class="anchr-border">@{{ size.size }}</span>
      <span v-for="material in materials" v-if="material.id == materialId" class="anchr-border">@{{ material.name }}</span>

    </a>
    <a v-else-if="showdata =='color-size'">
      <span v-for ="color in colors" v-if="color.id == colorId" class="anchr-border">@{{ color.name }}</span>
      <span v-for="size in sizes" v-if="size.id ==sizeId" class="anchr-border">@{{ size.size }}</span>
    </a>
    <a v-else-if="showdata =='size-color'">
      <span v-for="size in sizes" v-if="size.id ==sizeId" class="anchr-border">@{{ size.size }}</span>
      <span v-for ="color in colors" v-if="color.id == colorId" class="anchr-border">@{{ color.name }}</span>
    </a>
    <a v-else-if="showdata =='material-size-color'" >
      <span v-for="material in materials" v-if="material.id == materialId" class="anchr-border">@{{ material.name }}</span>
      <span v-for="size in sizes" v-if="size.id ==sizeId" class="anchr-border">@{{ size.size }}</span>
      <span v-for ="color in colors" v-if="color.id == colorId" class="anchr-border">@{{ color.name }}</span>
    </a>
    <a v-else-if="showdata =='material-color-size'" >
      <span v-for="material in materials" v-if="material.id == materialId" class="anchr-border">@{{ material.name }}</span>
      <span v-for="size in sizes" v-if="size.id ==sizeId" class="anchr-border">@{{ size.size }}</span>
      <span v-for ="color in colors" v-if="color.id == colorId" class="anchr-border">@{{ color.name }}</span>
    </a>
  </div>



<div style="position: relative;right:30px;top:10px;margin-bottom: 30px;">
  <button class="btn-material" @click=" showdata='' ,activeItem='',activesizeItem='',activecolorItem=''">Clear All</button>
</div>

