@extends('layouts.master')
@section('title', "| View Collections")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <main class="background-main img-background-repeat">
        <section id="top-menu" class="img-background-repeat">
            <section class="hero img-background-repeat" id="material-hero">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                            <h1>Mosaic Tiles Material</h1>
                            <p class="txt-material">
                                We specialize in all things MOSAIC. Interior or exterior design, glass or marble
                                tile ,
                                residential or commerical spaces, mosaic rugs or swimming pools we have got it all
                                covered!
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-11 col-md-offset-1 col-lg-11 col-lg-offset-1">
                            @include('materials.top-filteration')
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-2 col-lg-2">
                            @include('materials.aside-filteration')
                        </div>
                        <div class="col-sm-12 col-xs-12 col-md-10 col-lg-10">
                            @include('materials.filtered-data')
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
    <div class="bottom-line">
    </div>
@endsection
@section('pageSpecificScripts')
    <script type="text/javascript">
        window.onload = function () {
            new Vue({
                el: "#top-menu",
                data: {
                    showdata: '',
                    down: true,
                    desc: true,
                    materialId: '',
                    colorId: '',
                    sizeId: '',
                    materials: {!! $materials !!},
                    sizes: {!! $sizes !!},
                    colors: {!! $colors !!},
                    activeItem: '',
                    activesizeItem: '',
                    activecolorItem: '',
                },
                methods: {
                    show: function (message) {
                        if (this.showdata == 'material-size-color' && message == 'material') {
                            this.showdata = message + '-' + 'size-color';
                        }
                        else if (this.showdata == 'material-color-size' && message == 'material') {
                            this.showdata = message + '-' + 'color-size';
                        }
                        else if (this.showdata == 'material-size' && message == 'color') {
                            this.showdata = this.showdata + '-' + message;
                        }
                        else if (this.showdata == 'material-color' && message == 'size') {
                            this.showdata = this.showdata + '-' + message;
                        }
                        else if (this.showdata == 'color-size' && message == 'material') {
                            this.showdata = message + '-' + 'color-size';
                        }
                        else if (this.showdata == 'size-color' && message == 'material') {
                            this.showdata = message + '-' + 'size-color';
                        }
                        else if (this.showdata == 'color' && message == 'size') {
                            this.showdata = this.showdata + '-' + message;
                        }
                        else if (this.showdata == 'size' && message == 'color') {
                            this.showdata = this.showdata + '-' + message;
                        }
                        else if (message == 'color' && this.showdata == 'material') {
                            this.showdata = this.showdata + '-' + message;
                        }
                        else if (message == 'size' && this.showdata == 'material') {
                            this.showdata = this.showdata + '-' + message;
                        }
                        else if (this.showdata == 'size' && message == 'material') {
                            this.showdata = message + '-' + this.showdata;
                        }
                        else if (this.showdata == 'color' && message == 'material') {
                            this.showdata = message + '-' + this.showdata;
                        }
                        else if (message == 'color' && this.showdata == '') {
                            this.showdata = message;
                        }
                        else if (message == 'size' && this.showdata == '') {
                            this.showdata = message;
                        }
                        else if (message == 'material') {
                            this.showdata = message;
                        }
                    },
                    selectmaterial: function (event) {
                        materialId = event.currentTarget.id;
                        this.materialId = materialId;
                    },
                    selectsize: function (event) {
                        sizeId = event.currentTarget.id;
                        this.sizeId = sizeId;
                        return this.sizeId;
                    },
                    selectcolor: function (event) {
                        colorId = event.currentTarget.id;
                        this.colorId = colorId;
                        return this.colorId;
                    },
                    description: function (event) {
                        desc = !this.desc;
                        this.desc = desc;
                    },
                    download: function (event) {
                        down = !this.down;
                        this.down = down;
                    },
                    isActive: function (menuItem) {
                        return this.activeItem === menuItem
                    },
                    setActive: function (menuItem) {
                        this.activeItem = menuItem // no need for Vue.set()
                    },
                    issizeActive: function (menuItem) {
                        return this.activesizeItem === menuItem
                    },
                    setsizeActive: function (menuItem) {
                        this.activesizeItem = menuItem // no need for Vue.set()
                    },
                    iscolorActive: function (menuItem) {
                        return this.activecolorItem === menuItem
                    },
                    setcolorActive: function (menuItem) {
                        this.activecolorItem = menuItem // no need for Vue.set()
                    },
                }
            });
        }
    </script>
