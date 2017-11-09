<div  v-cloak>
    <div  v-if="showdata == '' || showdata == 'color' || showdata == 'size' || showdata == 'size-color' || showdata == 'color-size'">
      <div class="col-md-1 col-sm-2" v-for="material in materials"  :id="material.id" @click="selectmaterial($event),show('material'),setActive(material.name)" >
        <div class="img-material" >
          <a>
            <img :src="'/images/materials/'+ material.image" style="width:100%; height:64px;">
          </a>
        </div>
        <div class="material-name">@{{ material.name }}</div>
      </div>
    </div>
    <div  v-else= "showdata = 'material'" >
      <div v-for="material in materials">
        <div class=" col-lg-8 col-lg-offset-4 col-md-8 col-md-offset-4 col-sm-8 col-sm-offset-4 col-xs-11 col-xs-offset-1" v-if="material.id == materialId">
          <img :src = "'/images/materials/'+ material.image" alt="" height="256px" width="256px"/>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
              <div  v-if="material.id == materialId">
                <div class="btn-material-download">
                  <button class="btn-material btn-material-name col-md-2 col-md-offset-0 col-sm-2 col-sm-offset-6
                  col-xs-9 col-xs-offset-3" @click="description($event)">@{{ material.name }}</button>
                  <button class="btn-material btn-download col-md-2 col-md-pull-2 col-sm-2 col-sm-offset-6 col-xs-9 col-xs-offset-3" @click="download($event)">Download</button>
                </div>

          <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
              <div v-if="desc != true">
             <p class="txt-material-description">
              @{{ material.description }}
            </p>
            </div>
            </div>
          </div>

          <div v-if="down !=true" class="txt-download col-md-offset-4 col-sm-offset-1">
            <h3>Downloads</h3>
            <div v-for="material in materials">
              <div v-for="pdfs in material.pdf" >
                <div v-if="pdfs.material_id == materialId" class="col-sm-offset-3">
                  <a :href="'/files/materials/pdfs/'+pdfs.pdf_name+'/'+pdfs.pdf_name" :download="pdfs.pdf_name" class="text-hide-anchr">@{{ pdfs.pdf_name }} </a>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>

      </div>
    </div><!-- end of material filteration-->
    <div  v-if="showdata == 'material'">
      <div v-for= "material in materials" v-if="material.id == materialId">
        @include('materials.tables')
      </div>
    </div>
  </div>
