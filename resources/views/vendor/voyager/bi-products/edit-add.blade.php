@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(!is_null($dataTypeContent->getKey()))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{(!is_null($dataTypeContent->getKey()) ? 'editRows' : 'addRows' )};
                            @endphp

                            <!-- Add custom inputs -->
                            <!-- <form action="http://localhost/OpenCart/upload/admin/index.php?route=catalog/product/add&amp;user_token=8yZwOsNbIJCA7CNyv2nrbm4P5YKtZDAL" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab-general" data-toggle="tab" aria-expanded="true">General</a></li>
                                    <li class=""><a href="#tab-data" data-toggle="tab" aria-expanded="false">Data</a></li>
                                    <li class=""><a href="#tab-links" data-toggle="tab" aria-expanded="false">Links</a></li>
                                    <li class=""><a href="#tab-attribute" data-toggle="tab" aria-expanded="false">Attribute</a></li>
                                    <li class=""><a href="#tab-option" data-toggle="tab" aria-expanded="false">Option</a></li>
                                    <li class=""><a href="#tab-recurring" data-toggle="tab" aria-expanded="false">Recurring</a></li>
                                    <li class=""><a href="#tab-discount" data-toggle="tab" aria-expanded="false">Discount</a></li>
                                    <li class=""><a href="#tab-special" data-toggle="tab" aria-expanded="false">Special</a></li>
                                    <li class=""><a href="#tab-image" data-toggle="tab" aria-expanded="false">Image</a></li>
                                    <li class=""><a href="#tab-reward" data-toggle="tab" aria-expanded="false">Reward Points</a></li>
                                    <li class=""><a href="#tab-seo" data-toggle="tab" aria-expanded="false">SEO</a></li>
                                    <li class=""><a href="#tab-design" data-toggle="tab" aria-expanded="false">Design</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-general">
                                    <ul class="nav nav-tabs" id="language">
                                                        <li class="active"><a href="#language1" data-toggle="tab" aria-expanded="true"><img src="language/en-gb/en-gb.png" title="English"> English</a></li>
                                                    </ul>
                                    <div class="tab-content">                <div class="tab-pane active" id="language1">
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-name1">Product Name</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="product_description[1][name]" value="h123" placeholder="Product Name" id="input-name1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-description1">Description</label>
                                            <div class="col-sm-10">
                                            <textarea name="product_description[1][description]" placeholder="Description" id="input-description1" data-toggle="summernote" data-lang="" class="form-control" style="display: none;"></textarea><div class="note-editor note-frame panel panel-default"><div class="note-dropzone">  <div class="note-dropzone-message"></div></div><div class="note-toolbar panel-heading"><div class="note-btn-group btn-group note-style"><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-default btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Style"><i class="note-icon-magic"></i> <span class="note-icon-caret"></span></button><div class="dropdown-menu dropdown-style"><li><a href="#" data-value="p"><p>p</p></a></li><li><a href="#" data-value="blockquote"><blockquote>Quote</blockquote></a></li><li><a href="#" data-value="pre"><pre>Code</pre></a></li><li><a href="#" data-value="h1"><h1>Header 1</h1></a></li><li><a href="#" data-value="h2"><h2>Header 2</h2></a></li><li><a href="#" data-value="h3"><h3>Header 3</h3></a></li><li><a href="#" data-value="h4"><h4>Header 4</h4></a></li><li><a href="#" data-value="h5"><h5>Header 5</h5></a></li><li><a href="#" data-value="h6"><h6>Header 6</h6></a></li></div></div></div><div class="note-btn-group btn-group note-font"><button type="button" class="note-btn btn btn-default btn-sm note-btn-bold" tabindex="-1" title="" data-original-title="Bold (CTRL+B)"><i class="note-icon-bold"></i></button><button type="button" class="note-btn btn btn-default btn-sm note-btn-underline" tabindex="-1" title="" data-original-title="Underline (CTRL+U)"><i class="note-icon-underline"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Remove Font Style (CTRL+\)"><i class="note-icon-eraser"></i></button></div><div class="note-btn-group btn-group note-fontname"><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-default btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Font Family"><span class="note-current-fontname">Open Sans</span> <span class="note-icon-caret"></span></button><div class="dropdown-menu note-check dropdown-fontname"><li><a href="#" data-value="Arial" class=""><i class="note-icon-check"></i> <span style="font-family:Arial">Arial</span></a></li><li><a href="#" data-value="Arial Black" class=""><i class="note-icon-check"></i> <span style="font-family:Arial Black">Arial Black</span></a></li><li><a href="#" data-value="Comic Sans MS" class=""><i class="note-icon-check"></i> <span style="font-family:Comic Sans MS">Comic Sans MS</span></a></li><li><a href="#" data-value="Courier New" class=""><i class="note-icon-check"></i> <span style="font-family:Courier New">Courier New</span></a></li><li><a href="#" data-value="Helvetica" class=""><i class="note-icon-check"></i> <span style="font-family:Helvetica">Helvetica</span></a></li><li><a href="#" data-value="Impact" class=""><i class="note-icon-check"></i> <span style="font-family:Impact">Impact</span></a></li><li><a href="#" data-value="Tahoma" class=""><i class="note-icon-check"></i> <span style="font-family:Tahoma">Tahoma</span></a></li><li><a href="#" data-value="Times New Roman" class=""><i class="note-icon-check"></i> <span style="font-family:Times New Roman">Times New Roman</span></a></li><li><a href="#" data-value="Verdana" class=""><i class="note-icon-check"></i> <span style="font-family:Verdana">Verdana</span></a></li></div></div></div><div class="note-btn-group btn-group note-fontsize"><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-default btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Font Size"><span class="note-current-fontsize">13</span><span class="note-icon-caret"></span></button><div class="dropdown-menu note-check dropdown-fontsize"><li><a href="#" data-value="8" class=""><i class="note-icon-check"></i> 8</a></li><li><a href="#" data-value="9" class=""><i class="note-icon-check"></i> 9</a></li><li><a href="#" data-value="10" class=""><i class="note-icon-check"></i> 10</a></li><li><a href="#" data-value="11" class=""><i class="note-icon-check"></i> 11</a></li><li><a href="#" data-value="12" class=""><i class="note-icon-check"></i> 12</a></li><li><a href="#" data-value="14" class=""><i class="note-icon-check"></i> 14</a></li><li><a href="#" data-value="18" class=""><i class="note-icon-check"></i> 18</a></li><li><a href="#" data-value="24" class=""><i class="note-icon-check"></i> 24</a></li><li><a href="#" data-value="36" class=""><i class="note-icon-check"></i> 36</a></li></div></div></div><div class="note-btn-group btn-group note-color"><div class="note-btn-group btn-group note-color"><button type="button" class="note-btn btn btn-default btn-sm note-current-color-button" tabindex="-1" title="" data-original-title="Recent Color" data-backcolor="#FFFF00"><i class="note-icon-font note-recent-color" style="background-color: rgb(255, 255, 0);"></i></button><button type="button" class="note-btn btn btn-default btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="More Color"><span class="note-icon-caret"></span></button><div class="dropdown-menu"><li><div class="btn-group">  <div class="note-palette-title">Background Color</div>  <div>    <button type="button" class="note-color-reset btn btn-default" data-event="backColor" data-value="inherit">Transparent    </button>  </div>  <div class="note-holder" data-event="backColor"><div class="note-color-palette"><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#000000" data-event="backColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000"></button><button type="button" class="note-color-btn" style="background-color:#424242" data-event="backColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242"></button><button type="button" class="note-color-btn" style="background-color:#636363" data-event="backColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363"></button><button type="button" class="note-color-btn" style="background-color:#9C9C94" data-event="backColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94"></button><button type="button" class="note-color-btn" style="background-color:#CEC6CE" data-event="backColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE"></button><button type="button" class="note-color-btn" style="background-color:#EFEFEF" data-event="backColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF"></button><button type="button" class="note-color-btn" style="background-color:#F7F7F7" data-event="backColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7"></button><button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#FF0000" data-event="backColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000"></button><button type="button" class="note-color-btn" style="background-color:#FF9C00" data-event="backColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00"></button><button type="button" class="note-color-btn" style="background-color:#FFFF00" data-event="backColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00"></button><button type="button" class="note-color-btn" style="background-color:#00FF00" data-event="backColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00"></button><button type="button" class="note-color-btn" style="background-color:#00FFFF" data-event="backColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF"></button><button type="button" class="note-color-btn" style="background-color:#0000FF" data-event="backColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF"></button><button type="button" class="note-color-btn" style="background-color:#9C00FF" data-event="backColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF"></button><button type="button" class="note-color-btn" style="background-color:#FF00FF" data-event="backColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#F7C6CE" data-event="backColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE"></button><button type="button" class="note-color-btn" style="background-color:#FFE7CE" data-event="backColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE"></button><button type="button" class="note-color-btn" style="background-color:#FFEFC6" data-event="backColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6"></button><button type="button" class="note-color-btn" style="background-color:#D6EFD6" data-event="backColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6"></button><button type="button" class="note-color-btn" style="background-color:#CEDEE7" data-event="backColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7"></button><button type="button" class="note-color-btn" style="background-color:#CEE7F7" data-event="backColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7"></button><button type="button" class="note-color-btn" style="background-color:#D6D6E7" data-event="backColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7"></button><button type="button" class="note-color-btn" style="background-color:#E7D6DE" data-event="backColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E79C9C" data-event="backColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C"></button><button type="button" class="note-color-btn" style="background-color:#FFC69C" data-event="backColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C"></button><button type="button" class="note-color-btn" style="background-color:#FFE79C" data-event="backColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C"></button><button type="button" class="note-color-btn" style="background-color:#B5D6A5" data-event="backColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5"></button><button type="button" class="note-color-btn" style="background-color:#A5C6CE" data-event="backColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE"></button><button type="button" class="note-color-btn" style="background-color:#9CC6EF" data-event="backColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF"></button><button type="button" class="note-color-btn" style="background-color:#B5A5D6" data-event="backColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6"></button><button type="button" class="note-color-btn" style="background-color:#D6A5BD" data-event="backColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E76363" data-event="backColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363"></button><button type="button" class="note-color-btn" style="background-color:#F7AD6B" data-event="backColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B"></button><button type="button" class="note-color-btn" style="background-color:#FFD663" data-event="backColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663"></button><button type="button" class="note-color-btn" style="background-color:#94BD7B" data-event="backColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B"></button><button type="button" class="note-color-btn" style="background-color:#73A5AD" data-event="backColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD"></button><button type="button" class="note-color-btn" style="background-color:#6BADDE" data-event="backColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE"></button><button type="button" class="note-color-btn" style="background-color:#8C7BC6" data-event="backColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6"></button><button type="button" class="note-color-btn" style="background-color:#C67BA5" data-event="backColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#CE0000" data-event="backColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000"></button><button type="button" class="note-color-btn" style="background-color:#E79439" data-event="backColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439"></button><button type="button" class="note-color-btn" style="background-color:#EFC631" data-event="backColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631"></button><button type="button" class="note-color-btn" style="background-color:#6BA54A" data-event="backColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A"></button><button type="button" class="note-color-btn" style="background-color:#4A7B8C" data-event="backColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C"></button><button type="button" class="note-color-btn" style="background-color:#3984C6" data-event="backColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6"></button><button type="button" class="note-color-btn" style="background-color:#634AA5" data-event="backColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5"></button><button type="button" class="note-color-btn" style="background-color:#A54A7B" data-event="backColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#9C0000" data-event="backColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000"></button><button type="button" class="note-color-btn" style="background-color:#B56308" data-event="backColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308"></button><button type="button" class="note-color-btn" style="background-color:#BD9400" data-event="backColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400"></button><button type="button" class="note-color-btn" style="background-color:#397B21" data-event="backColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21"></button><button type="button" class="note-color-btn" style="background-color:#104A5A" data-event="backColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A"></button><button type="button" class="note-color-btn" style="background-color:#085294" data-event="backColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294"></button><button type="button" class="note-color-btn" style="background-color:#311873" data-event="backColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873"></button><button type="button" class="note-color-btn" style="background-color:#731842" data-event="backColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#630000" data-event="backColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000"></button><button type="button" class="note-color-btn" style="background-color:#7B3900" data-event="backColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900"></button><button type="button" class="note-color-btn" style="background-color:#846300" data-event="backColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300"></button><button type="button" class="note-color-btn" style="background-color:#295218" data-event="backColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218"></button><button type="button" class="note-color-btn" style="background-color:#083139" data-event="backColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139"></button><button type="button" class="note-color-btn" style="background-color:#003163" data-event="backColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163"></button><button type="button" class="note-color-btn" style="background-color:#21104A" data-event="backColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A"></button><button type="button" class="note-color-btn" style="background-color:#4A1031" data-event="backColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031"></button></div></div></div></div><div class="btn-group">  <div class="note-palette-title">Foreground Color</div>  <div>    <button type="button" class="note-color-reset btn btn-default" data-event="removeFormat" data-value="foreColor">Reset to default    </button>  </div>  <div class="note-holder" data-event="foreColor"><div class="note-color-palette"><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#000000" data-event="foreColor" data-value="#000000" title="" data-toggle="button" tabindex="-1" data-original-title="#000000"></button><button type="button" class="note-color-btn" style="background-color:#424242" data-event="foreColor" data-value="#424242" title="" data-toggle="button" tabindex="-1" data-original-title="#424242"></button><button type="button" class="note-color-btn" style="background-color:#636363" data-event="foreColor" data-value="#636363" title="" data-toggle="button" tabindex="-1" data-original-title="#636363"></button><button type="button" class="note-color-btn" style="background-color:#9C9C94" data-event="foreColor" data-value="#9C9C94" title="" data-toggle="button" tabindex="-1" data-original-title="#9C9C94"></button><button type="button" class="note-color-btn" style="background-color:#CEC6CE" data-event="foreColor" data-value="#CEC6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#CEC6CE"></button><button type="button" class="note-color-btn" style="background-color:#EFEFEF" data-event="foreColor" data-value="#EFEFEF" title="" data-toggle="button" tabindex="-1" data-original-title="#EFEFEF"></button><button type="button" class="note-color-btn" style="background-color:#F7F7F7" data-event="foreColor" data-value="#F7F7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#F7F7F7"></button><button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFFFF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#FF0000" data-event="foreColor" data-value="#FF0000" title="" data-toggle="button" tabindex="-1" data-original-title="#FF0000"></button><button type="button" class="note-color-btn" style="background-color:#FF9C00" data-event="foreColor" data-value="#FF9C00" title="" data-toggle="button" tabindex="-1" data-original-title="#FF9C00"></button><button type="button" class="note-color-btn" style="background-color:#FFFF00" data-event="foreColor" data-value="#FFFF00" title="" data-toggle="button" tabindex="-1" data-original-title="#FFFF00"></button><button type="button" class="note-color-btn" style="background-color:#00FF00" data-event="foreColor" data-value="#00FF00" title="" data-toggle="button" tabindex="-1" data-original-title="#00FF00"></button><button type="button" class="note-color-btn" style="background-color:#00FFFF" data-event="foreColor" data-value="#00FFFF" title="" data-toggle="button" tabindex="-1" data-original-title="#00FFFF"></button><button type="button" class="note-color-btn" style="background-color:#0000FF" data-event="foreColor" data-value="#0000FF" title="" data-toggle="button" tabindex="-1" data-original-title="#0000FF"></button><button type="button" class="note-color-btn" style="background-color:#9C00FF" data-event="foreColor" data-value="#9C00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#9C00FF"></button><button type="button" class="note-color-btn" style="background-color:#FF00FF" data-event="foreColor" data-value="#FF00FF" title="" data-toggle="button" tabindex="-1" data-original-title="#FF00FF"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#F7C6CE" data-event="foreColor" data-value="#F7C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#F7C6CE"></button><button type="button" class="note-color-btn" style="background-color:#FFE7CE" data-event="foreColor" data-value="#FFE7CE" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE7CE"></button><button type="button" class="note-color-btn" style="background-color:#FFEFC6" data-event="foreColor" data-value="#FFEFC6" title="" data-toggle="button" tabindex="-1" data-original-title="#FFEFC6"></button><button type="button" class="note-color-btn" style="background-color:#D6EFD6" data-event="foreColor" data-value="#D6EFD6" title="" data-toggle="button" tabindex="-1" data-original-title="#D6EFD6"></button><button type="button" class="note-color-btn" style="background-color:#CEDEE7" data-event="foreColor" data-value="#CEDEE7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEDEE7"></button><button type="button" class="note-color-btn" style="background-color:#CEE7F7" data-event="foreColor" data-value="#CEE7F7" title="" data-toggle="button" tabindex="-1" data-original-title="#CEE7F7"></button><button type="button" class="note-color-btn" style="background-color:#D6D6E7" data-event="foreColor" data-value="#D6D6E7" title="" data-toggle="button" tabindex="-1" data-original-title="#D6D6E7"></button><button type="button" class="note-color-btn" style="background-color:#E7D6DE" data-event="foreColor" data-value="#E7D6DE" title="" data-toggle="button" tabindex="-1" data-original-title="#E7D6DE"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E79C9C" data-event="foreColor" data-value="#E79C9C" title="" data-toggle="button" tabindex="-1" data-original-title="#E79C9C"></button><button type="button" class="note-color-btn" style="background-color:#FFC69C" data-event="foreColor" data-value="#FFC69C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFC69C"></button><button type="button" class="note-color-btn" style="background-color:#FFE79C" data-event="foreColor" data-value="#FFE79C" title="" data-toggle="button" tabindex="-1" data-original-title="#FFE79C"></button><button type="button" class="note-color-btn" style="background-color:#B5D6A5" data-event="foreColor" data-value="#B5D6A5" title="" data-toggle="button" tabindex="-1" data-original-title="#B5D6A5"></button><button type="button" class="note-color-btn" style="background-color:#A5C6CE" data-event="foreColor" data-value="#A5C6CE" title="" data-toggle="button" tabindex="-1" data-original-title="#A5C6CE"></button><button type="button" class="note-color-btn" style="background-color:#9CC6EF" data-event="foreColor" data-value="#9CC6EF" title="" data-toggle="button" tabindex="-1" data-original-title="#9CC6EF"></button><button type="button" class="note-color-btn" style="background-color:#B5A5D6" data-event="foreColor" data-value="#B5A5D6" title="" data-toggle="button" tabindex="-1" data-original-title="#B5A5D6"></button><button type="button" class="note-color-btn" style="background-color:#D6A5BD" data-event="foreColor" data-value="#D6A5BD" title="" data-toggle="button" tabindex="-1" data-original-title="#D6A5BD"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#E76363" data-event="foreColor" data-value="#E76363" title="" data-toggle="button" tabindex="-1" data-original-title="#E76363"></button><button type="button" class="note-color-btn" style="background-color:#F7AD6B" data-event="foreColor" data-value="#F7AD6B" title="" data-toggle="button" tabindex="-1" data-original-title="#F7AD6B"></button><button type="button" class="note-color-btn" style="background-color:#FFD663" data-event="foreColor" data-value="#FFD663" title="" data-toggle="button" tabindex="-1" data-original-title="#FFD663"></button><button type="button" class="note-color-btn" style="background-color:#94BD7B" data-event="foreColor" data-value="#94BD7B" title="" data-toggle="button" tabindex="-1" data-original-title="#94BD7B"></button><button type="button" class="note-color-btn" style="background-color:#73A5AD" data-event="foreColor" data-value="#73A5AD" title="" data-toggle="button" tabindex="-1" data-original-title="#73A5AD"></button><button type="button" class="note-color-btn" style="background-color:#6BADDE" data-event="foreColor" data-value="#6BADDE" title="" data-toggle="button" tabindex="-1" data-original-title="#6BADDE"></button><button type="button" class="note-color-btn" style="background-color:#8C7BC6" data-event="foreColor" data-value="#8C7BC6" title="" data-toggle="button" tabindex="-1" data-original-title="#8C7BC6"></button><button type="button" class="note-color-btn" style="background-color:#C67BA5" data-event="foreColor" data-value="#C67BA5" title="" data-toggle="button" tabindex="-1" data-original-title="#C67BA5"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#CE0000" data-event="foreColor" data-value="#CE0000" title="" data-toggle="button" tabindex="-1" data-original-title="#CE0000"></button><button type="button" class="note-color-btn" style="background-color:#E79439" data-event="foreColor" data-value="#E79439" title="" data-toggle="button" tabindex="-1" data-original-title="#E79439"></button><button type="button" class="note-color-btn" style="background-color:#EFC631" data-event="foreColor" data-value="#EFC631" title="" data-toggle="button" tabindex="-1" data-original-title="#EFC631"></button><button type="button" class="note-color-btn" style="background-color:#6BA54A" data-event="foreColor" data-value="#6BA54A" title="" data-toggle="button" tabindex="-1" data-original-title="#6BA54A"></button><button type="button" class="note-color-btn" style="background-color:#4A7B8C" data-event="foreColor" data-value="#4A7B8C" title="" data-toggle="button" tabindex="-1" data-original-title="#4A7B8C"></button><button type="button" class="note-color-btn" style="background-color:#3984C6" data-event="foreColor" data-value="#3984C6" title="" data-toggle="button" tabindex="-1" data-original-title="#3984C6"></button><button type="button" class="note-color-btn" style="background-color:#634AA5" data-event="foreColor" data-value="#634AA5" title="" data-toggle="button" tabindex="-1" data-original-title="#634AA5"></button><button type="button" class="note-color-btn" style="background-color:#A54A7B" data-event="foreColor" data-value="#A54A7B" title="" data-toggle="button" tabindex="-1" data-original-title="#A54A7B"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#9C0000" data-event="foreColor" data-value="#9C0000" title="" data-toggle="button" tabindex="-1" data-original-title="#9C0000"></button><button type="button" class="note-color-btn" style="background-color:#B56308" data-event="foreColor" data-value="#B56308" title="" data-toggle="button" tabindex="-1" data-original-title="#B56308"></button><button type="button" class="note-color-btn" style="background-color:#BD9400" data-event="foreColor" data-value="#BD9400" title="" data-toggle="button" tabindex="-1" data-original-title="#BD9400"></button><button type="button" class="note-color-btn" style="background-color:#397B21" data-event="foreColor" data-value="#397B21" title="" data-toggle="button" tabindex="-1" data-original-title="#397B21"></button><button type="button" class="note-color-btn" style="background-color:#104A5A" data-event="foreColor" data-value="#104A5A" title="" data-toggle="button" tabindex="-1" data-original-title="#104A5A"></button><button type="button" class="note-color-btn" style="background-color:#085294" data-event="foreColor" data-value="#085294" title="" data-toggle="button" tabindex="-1" data-original-title="#085294"></button><button type="button" class="note-color-btn" style="background-color:#311873" data-event="foreColor" data-value="#311873" title="" data-toggle="button" tabindex="-1" data-original-title="#311873"></button><button type="button" class="note-color-btn" style="background-color:#731842" data-event="foreColor" data-value="#731842" title="" data-toggle="button" tabindex="-1" data-original-title="#731842"></button></div><div class="note-color-row"><button type="button" class="note-color-btn" style="background-color:#630000" data-event="foreColor" data-value="#630000" title="" data-toggle="button" tabindex="-1" data-original-title="#630000"></button><button type="button" class="note-color-btn" style="background-color:#7B3900" data-event="foreColor" data-value="#7B3900" title="" data-toggle="button" tabindex="-1" data-original-title="#7B3900"></button><button type="button" class="note-color-btn" style="background-color:#846300" data-event="foreColor" data-value="#846300" title="" data-toggle="button" tabindex="-1" data-original-title="#846300"></button><button type="button" class="note-color-btn" style="background-color:#295218" data-event="foreColor" data-value="#295218" title="" data-toggle="button" tabindex="-1" data-original-title="#295218"></button><button type="button" class="note-color-btn" style="background-color:#083139" data-event="foreColor" data-value="#083139" title="" data-toggle="button" tabindex="-1" data-original-title="#083139"></button><button type="button" class="note-color-btn" style="background-color:#003163" data-event="foreColor" data-value="#003163" title="" data-toggle="button" tabindex="-1" data-original-title="#003163"></button><button type="button" class="note-color-btn" style="background-color:#21104A" data-event="foreColor" data-value="#21104A" title="" data-toggle="button" tabindex="-1" data-original-title="#21104A"></button><button type="button" class="note-color-btn" style="background-color:#4A1031" data-event="foreColor" data-value="#4A1031" title="" data-toggle="button" tabindex="-1" data-original-title="#4A1031"></button></div></div></div></div></li></div></div></div><div class="note-btn-group btn-group note-para"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Unordered list (CTRL+SHIFT+NUM7)"><i class="note-icon-unorderedlist"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Ordered list (CTRL+SHIFT+NUM8)"><i class="note-icon-orderedlist"></i></button><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-default btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Paragraph"><i class="note-icon-align-left"></i> <span class="note-icon-caret"></span></button><div class="dropdown-menu"><div class="note-btn-group btn-group note-align"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Align left (CTRL+SHIFT+L)"><i class="note-icon-align-left"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Align center (CTRL+SHIFT+E)"><i class="note-icon-align-center"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Align right (CTRL+SHIFT+R)"><i class="note-icon-align-right"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Justify full (CTRL+SHIFT+J)"><i class="note-icon-align-justify"></i></button></div><div class="note-btn-group btn-group note-list"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Outdent (CTRL+[)"><i class="note-icon-align-outdent"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Indent (CTRL+])"><i class="note-icon-align-indent"></i></button></div></div></div></div><div class="note-btn-group btn-group note-table"><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-default btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="" data-original-title="Table"><i class="note-icon-table"></i> <span class="note-icon-caret"></span></button><div class="dropdown-menu note-table"><div class="note-dimension-picker">  <div class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1" style="width: 10em; height: 10em;"></div>  <div class="note-dimension-picker-highlighted"></div>  <div class="note-dimension-picker-unhighlighted"></div></div><div class="note-dimension-display">1 x 1</div></div></div></div><div class="note-btn-group btn-group note-insert"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Link (CTRL+K)"><i class="note-icon-link"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Picture"><i class="note-icon-picture"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Video"><i class="note-icon-video"></i></button></div><div class="note-btn-group btn-group note-view"><button type="button" class="note-btn btn btn-default btn-sm btn-fullscreen" tabindex="-1" title="" data-original-title="Full Screen"><i class="note-icon-arrows-alt"></i></button><button type="button" class="note-btn btn btn-default btn-sm btn-codeview" tabindex="-1" title="" data-original-title="Code View"><i class="note-icon-code"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Help"><i class="note-icon-question"></i></button></div></div><div class="note-editing-area"><div class="note-handle"><div class="note-control-selection"><div class="note-control-selection-bg"></div><div class="note-control-holder note-control-nw"></div><div class="note-control-holder note-control-ne"></div><div class="note-control-holder note-control-sw"></div><div class="note-control-sizing note-control-se"></div><div class="note-control-selection-info"></div></div></div><textarea class="note-codable"></textarea><div class="note-editable panel-body" contenteditable="true" style="height: 300px;"><p><br></p></div></div><div class="note-statusbar">  <div class="note-resizebar">    <div class="note-icon-bar"></div>    <div class="note-icon-bar"></div>    <div class="note-icon-bar"></div>  </div></div><div class="modal link-dialog" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>      <h4 class="modal-title">Insert Link</h4>    </div>    <div class="modal-body"><div class="form-group"><label>Text to display</label><input class="note-link-text form-control" type="text"></div><div class="form-group"><label>To what URL should this link go?</label><input class="note-link-url form-control" type="text" value="http://"></div><div class="checkbox"><label><input type="checkbox" checked=""> Open in new window</label></div></div>    <div class="modal-footer"><button href="#" class="btn btn-primary note-link-btn disabled" disabled="">Insert Link</button></div>  </div></div></div><div class="modal" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>      <h4 class="modal-title">Insert Image</h4>    </div>    <div class="modal-body"><div class="form-group note-group-select-from-files"><label>Select from files</label><input class="note-image-input form-control" type="file" name="files" accept="image/*" multiple="multiple"></div><div class="form-group note-group-image-url" style="overflow:auto;"><label>Image URL</label><input class="note-image-url form-control col-md-12" type="text"></div></div>    <div class="modal-footer"><button href="#" class="btn btn-primary note-image-btn disabled" disabled="">Insert Image</button></div>  </div></div></div><div class="modal" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>      <h4 class="modal-title">Insert Video</h4>    </div>    <div class="modal-body"><div class="form-group row-fluid"><label>Video URL? <small class="text-muted">(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label><input class="note-video-url form-control span12" type="text"></div></div>    <div class="modal-footer"><button href="#" class="btn btn-primary note-video-btn disabled" disabled="">Insert Video</button></div>  </div></div></div><div class="modal" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>      <h4 class="modal-title">Help</h4>    </div>    <div class="modal-body" style="max-height: 300px; overflow: scroll;"><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Insert Paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Z</kbd></label><span>Undoes the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Y</kbd></label><span>Redoes the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Untab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+B</kbd></label><span>Set a bold style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+I</kbd></label><span>Set a italic style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+U</kbd></label><span>Set a underline style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+S</kbd></label><span>Set a strikethrough style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+BACKSLASH</kbd></label><span>Clean a style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+L</kbd></label><span>Set left align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+E</kbd></label><span>Set center align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+R</kbd></label><span>Set right align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+J</kbd></label><span>Set full align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM7</kbd></label><span>Toggle unordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM8</kbd></label><span>Toggle ordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+LEFTBRACKET</kbd></label><span>Outdent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+RIGHTBRACKET</kbd></label><span>Indent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM0</kbd></label><span>Change current block's format as a paragraph(P tag)</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM1</kbd></label><span>Change current block's format as H1</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM2</kbd></label><span>Change current block's format as H2</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM3</kbd></label><span>Change current block's format as H3</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM4</kbd></label><span>Change current block's format as H4</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM5</kbd></label><span>Change current block's format as H5</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM6</kbd></label><span>Change current block's format as H6</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+ENTER</kbd></label><span>Insert horizontal rule</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+K</kbd></label><span>Show Link Dialog</span></div>    <div class="modal-footer"><p class="text-center"><a href="http://summernote.org/" target="_blank">Summernote 0.8.2</a> · <a href="https://github.com/summernote/summernote" target="_blank">Project</a> · <a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a></p></div>  </div></div></div><div class="modal" aria-hidden="false" tabindex="-1"><div class="modal-dialog">  <div class="modal-content">    <div class="modal-header">      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>      <h4 class="modal-title">Image Attributes</h4>    </div>    <div class="modal-body"><div class="form-group"><label for="note-image-attributes-title" class="control-label col-xs-2">Title</label><div class="input-group col-xs-10"><input type="text" id="note-image-attributes-title" class="note-image-attributes-title form-control"></div></div><div class="form-group"><label for="note-image-attributes-src" class="control-label col-xs-2">Source</label><div class="input-group col-xs-10"><input type="text" id="note-image-attributes-src" class="note-image-attributes-src form-control"></div></div><div class="form-group note-group-select-from-files"><label class="control-label col-xs-2"></label><div class="input-group col-xs-10"><input class="note-image-input form-control" type="file" name="file" accept="image/*"><small class="help-block">Selecting an image will replace existing image with an Inlined Image.</small></div></div><div class="form-group"><label for="note-image-attributes-alt" class="control-label col-xs-2">Alt</label><div class="input-group col-xs-10"><input type="text" id="note-image-attributes-alt" class="note-image-attributes-alt form-control"></div></div><h4>Link Attributes</h4><hr><div class="form-group"><label for="note-image-attributes-link-href" class="control-label col-xs-2">URL</label><div class="input-group col-xs-10"><input type="text" id="note-image-attributes-link-href" class="note-image-attributes-href form-control"></div></div><div class="form-group"><label for="note-image-attributes-link-target" class="control-label col-xs-2">Target</label><div class="input-group col-xs-10"><select id="note-image-attributes-link-target" class="note-image-attributes-target form-control"><option value="_self">Self</option><option value="_blank">Blank</option><option value="_top">Top</option><option value="_parent">Parent</option></select></div></div></div>    <div class="modal-footer"><button href="#" class="btn btn-primary note-image-attributes-btn">OK</button></div>  </div></div></div></div>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-meta-title1">Meta Tag Title</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="product_description[1][meta_title]" value="ha1234" placeholder="Meta Tag Title" id="input-meta-title1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-meta-description1">Meta Tag Description</label>
                                            <div class="col-sm-10">
                                            <textarea name="product_description[1][meta_description]" rows="5" placeholder="Meta Tag Description" id="input-meta-description1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
                                            <div class="col-sm-10">
                                            <textarea name="product_description[1][meta_keyword]" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="input-tag1"><span data-toggle="tooltip" title="" data-original-title="Comma separated">Product Tags</span></label>
                                            <div class="col-sm-10">
                                            <input type="text" name="product_description[1][tag]" value="" placeholder="Product Tags" id="input-tag1" class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-data">
                                    <div class="form-group required has-error">
                                        <label class="col-sm-2 control-label" for="input-model">Model</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="model" value="" placeholder="Model" id="input-model" class="form-control">
                                                            <div class="text-danger">Product Model must be greater than 1 and less than 64 characters!</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-sku"><span data-toggle="tooltip" title="" data-original-title="Stock Keeping Unit">SKU</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="sku" value="" placeholder="SKU" id="input-sku" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-upc"><span data-toggle="tooltip" title="" data-original-title="Universal Product Code">UPC</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="upc" value="" placeholder="UPC" id="input-upc" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-ean"><span data-toggle="tooltip" title="" data-original-title="European Article Number">EAN</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="ean" value="" placeholder="EAN" id="input-ean" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-jan"><span data-toggle="tooltip" title="" data-original-title="Japanese Article Number">JAN</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="jan" value="" placeholder="JAN" id="input-jan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-isbn"><span data-toggle="tooltip" title="" data-original-title="International Standard Book Number">ISBN</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="isbn" value="" placeholder="ISBN" id="input-isbn" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-mpn"><span data-toggle="tooltip" title="" data-original-title="Manufacturer Part Number">MPN</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="mpn" value="" placeholder="MPN" id="input-mpn" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-location">Location</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="location" value="" placeholder="Location" id="input-location" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-price">Price</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="price" value="" placeholder="Price" id="input-price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-tax-class">Tax Class</label>
                                        <div class="col-sm-10">
                                        <select name="tax_class_id" id="input-tax-class" class="form-control">
                                            <option value="0"> --- None --- </option>
                                            

                                                                
                                            
                                            <option value="9">Taxable Goods</option>
                                            

                                                                                    
                                            
                                            <option value="10">Downloadable Products</option>
                                            

                                                                
                                        
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="quantity" value="1" placeholder="Quantity" id="input-quantity" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-minimum"><span data-toggle="tooltip" title="" data-original-title="Force a minimum ordered amount">Minimum Quantity</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="minimum" value="1" placeholder="Minimum Quantity" id="input-minimum" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-subtract">Subtract Stock</label>
                                        <div class="col-sm-10">
                                        <select name="subtract" id="input-subtract" class="form-control">
                                            

                                            
                                            
                                            <option value="1" selected="selected">Yes</option>
                                            <option value="0">No</option>
                                            

                                            
                                        
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="" data-original-title="Status shown when a product is out of stock">Out Of Stock Status</span></label>
                                        <div class="col-sm-10">
                                        <select name="stock_status_id" id="input-stock-status" class="form-control">
                                            

                                                                
                                            
                                            <option value="6" selected="selected">2-3 Days</option>
                                            

                                                                                    
                                            
                                            <option value="7">In Stock</option>
                                            

                                                                                    
                                            
                                            <option value="5">Out Of Stock</option>
                                            

                                                                                    
                                            
                                            <option value="8">Pre-Order</option>
                                            

                                                                
                                        
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Requires Shipping</label>
                                        <div class="col-sm-10">
                                        <label class="radio-inline">                     <input type="radio" name="shipping" value="1" checked="checked">
                                            Yes
                                            </label>
                                        <label class="radio-inline">                     <input type="radio" name="shipping" value="0">
                                            No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-date-available">Date Available</label>
                                        <div class="col-sm-3">
                                        <div class="input-group date">
                                            <input type="text" name="date_available" value="2018-07-19" placeholder="Date Available" data-date-format="YYYY-MM-DD" id="input-date-available" class="form-control">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-length">Dimensions (L x W x H)</label>
                                        <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            <input type="text" name="length" value="" placeholder="Length" id="input-length" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                            <input type="text" name="width" value="" placeholder="Width" id="input-width" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                            <input type="text" name="height" value="" placeholder="Height" id="input-height" class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-length-class">Length Class</label>
                                        <div class="col-sm-10">
                                        <select name="length_class_id" id="input-length-class" class="form-control">
                                            

                                                                
                                            
                                            <option value="1" selected="selected">Centimeter</option>
                                            

                                                                                    
                                            
                                            <option value="2">Millimeter</option>
                                            

                                                                                    
                                            
                                            <option value="3">Inch</option>
                                            

                                                                
                                        
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-weight">Weight</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="weight" value="" placeholder="Weight" id="input-weight" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-weight-class">Weight Class</label>
                                        <div class="col-sm-10">
                                        <select name="weight_class_id" id="input-weight-class" class="form-control">
                                            

                                                                
                                            
                                            <option value="1" selected="selected">Kilogram</option>
                                            

                                                                                    
                                            
                                            <option value="2">Gram</option>
                                            

                                                                                    
                                            
                                            <option value="5">Pound </option>
                                            

                                                                                    
                                            
                                            <option value="6">Ounce</option>
                                            

                                                                
                                        
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-status">Status</label>
                                        <div class="col-sm-10">
                                        <select name="status" id="input-status" class="form-control">
                                            

                                            
                                            
                                            <option value="1" selected="selected">Enabled</option>
                                            <option value="0">Disabled</option>
                                            

                                            
                                        
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="sort_order" value="1" placeholder="Sort Order" id="input-sort-order" class="form-control">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-links">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Manufacturer</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="manufacturer" value="" placeholder="Manufacturer" id="input-manufacturer" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                                        <input type="hidden" name="manufacturer_id" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Categories</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="category" value="" placeholder="Categories" id="input-category" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                                        <div id="product-category" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-filter"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Filters</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="filter" value="" placeholder="Filters" id="input-filter" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                                        <div id="product-filter" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Stores</label>
                                        <div class="col-sm-10">
                                        <div class="well well-sm" style="height: 150px; overflow: auto;">                     <div class="checkbox">
                                            <label>                         <input type="checkbox" name="product_store[]" value="0" checked="checked">
                                                Default
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-download"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Downloads</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="download" value="" placeholder="Downloads" id="input-download" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                                        <div id="product-download" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-related"><span data-toggle="tooltip" title="" data-original-title="(Autocomplete)">Related Products</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="related" value="" placeholder="Related Products" id="input-related" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                                        <div id="product-related" class="well well-sm" style="height: 150px; overflow: auto;"> </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-attribute">
                                    <div class="table-responsive">
                                        <table id="attribute" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Attribute</td>
                                            <td class="text-left">Text</td>
                                            <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                                                </tbody>
                                        
                                        <tfoot>
                                            <tr>
                                            <td colspan="2"></td>
                                            <td class="text-right"><button type="button" onclick="addAttribute();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Attribute"><i class="fa fa-plus-circle"></i></button></td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-option">
                                    <div class="row">
                                        <div class="col-sm-2">
                                        <ul class="nav nav-pills nav-stacked" id="option">
                                                                                    <li>
                                            <input type="text" name="option" value="" placeholder="Option" id="input-option" class="form-control" autocomplete="off"><ul class="dropdown-menu" style="top: 36px; left: 0px; display: none;"><li class="dropdown-header">Choose</li><li data-value="2"><a href="#">&nbsp;&nbsp;&nbsp;Checkbox</a></li><li class="dropdown-header">Date</li><li data-value="8"><a href="#">&nbsp;&nbsp;&nbsp;Date</a></li><li data-value="10"><a href="#">&nbsp;&nbsp;&nbsp;Date &amp; Time</a></li><li data-value="12"><a href="#">&nbsp;&nbsp;&nbsp;Delivery Date</a></li><li class="dropdown-header">File</li><li data-value="7"><a href="#">&nbsp;&nbsp;&nbsp;File</a></li></ul>
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="col-sm-10">
                                        <div class="tab-content">                                          </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-recurring">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Recurring Profile</td>
                                            <td class="text-left">Customer Group</td>
                                            <td class="text-left"></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                                                </tbody>
                                        
                                        <tfoot>
                                            <tr>
                                            <td colspan="2"></td>
                                            <td class="text-left"><button type="button" onclick="addRecurring()" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Recurring"><i class="fa fa-plus-circle"></i></button></td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-discount">
                                    <div class="table-responsive">
                                        <table id="discount" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Customer Group</td>
                                            <td class="text-right">Quantity</td>
                                            <td class="text-right">Priority</td>
                                            <td class="text-right">Price</td>
                                            <td class="text-left">Date Start</td>
                                            <td class="text-left">Date End</td>
                                            <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                                                </tbody>
                                        
                                        <tfoot>
                                            <tr>
                                            <td colspan="6"></td>
                                            <td class="text-left"><button type="button" onclick="addDiscount();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Discount"><i class="fa fa-plus-circle"></i></button></td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-special">
                                    <div class="table-responsive">
                                        <table id="special" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Customer Group</td>
                                            <td class="text-right">Priority</td>
                                            <td class="text-right">Price</td>
                                            <td class="text-left">Date Start</td>
                                            <td class="text-left">Date End</td>
                                            <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                                                </tbody>
                                        
                                        <tfoot>
                                            <tr>
                                            <td colspan="5"></td>
                                            <td class="text-left"><button type="button" onclick="addSpecial();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Special"><i class="fa fa-plus-circle"></i></button></td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-image">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Image</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td class="text-left"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="http://localhost/OpenCart/upload/image/cache/no_image-100x100.png" alt="" title="" data-placeholder="http://localhost/OpenCart/upload/image/cache/no_image-100x100.png"></a>
                                                <input type="hidden" name="image" value="" id="input-image"></td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="images" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Additional Images</td>
                                            <td class="text-right">Sort Order</td>
                                            <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                                                </tbody>
                                        
                                        <tfoot>
                                            <tr>
                                            <td colspan="2"></td>
                                            <td class="text-left"><button type="button" onclick="addImage();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add Image"><i class="fa fa-plus-circle"></i></button></td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-reward">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-points"><span data-toggle="tooltip" title="" data-original-title="Number of points needed to buy this item. If you don't want this product to be purchased with points leave as 0.">Points</span></label>
                                        <div class="col-sm-10">
                                        <input type="text" name="points" value="" placeholder="Points" id="input-points" class="form-control">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Customer Group</td>
                                            <td class="text-right">Reward Points</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                            <tr>
                                            <td class="text-left">Default</td>
                                            <td class="text-right"><input type="text" name="product_reward[1][points]" value="" class="form-control"></td>
                                        </tr>
                                                            </tbody>
                                        
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-seo">
                                    <div class="alert alert-info"><i class="fa fa-info-circle"></i> Do not use spaces, instead replace spaces with - and make sure the SEO URL is globally unique.</div>            
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Stores</td>
                                    <td class="text-left">Keyword</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                            <tr>
                                            <td class="text-left">Default</td>
                                            <td class="text-left">                      <div class="input-group"><span class="input-group-addon"><img src="language/en-gb/en-gb.png" title="English"></span>
                                                <input type="text" name="product_seo_url[0][1]" value="" placeholder="Keyword" class="form-control">
                                            </div>
                                            
                                            </td>
                                        </tr>
                                                            </tbody>
                                        
                                        </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab-design">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <td class="text-left">Stores</td>
                                            <td class="text-left">Layout Override</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                            <tr>
                                            <td class="text-left">Default</td>
                                            <td class="text-left"><select name="product_layout[0]" class="form-control">
                                                <option value=""></option>
                                                

                                                                            
                                                
                                                <option value="6">Account</option>
                                                

                                                                                                    
                                                
                                                <option value="10">Affiliate</option>
                                                

                                                                                                    
                                                
                                                <option value="3">Category</option>
                                                

                                                                                                    
                                                
                                                <option value="7">Checkout</option>
                                                

                                                                                                    
                                                
                                                <option value="12">Compare</option>
                                                

                                                                                                    
                                                
                                                <option value="8">Contact</option>
                                                

                                                                                                    
                                                
                                                <option value="4">Default</option>
                                                

                                                                                                    
                                                
                                                <option value="1">Home</option>
                                                

                                                                                                    
                                                
                                                <option value="11">Information</option>
                                                

                                                                                                    
                                                
                                                <option value="5">Manufacturer</option>
                                                

                                                                                                    
                                                
                                                <option value="2">Product</option>
                                                

                                                                                                    
                                                
                                                <option value="13">Search</option>
                                                

                                                                                                    
                                                
                                                <option value="9">Sitemap</option>
                                                

                                                                            
                                            
                                            </select></td>
                                        </tr>
                                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </form>-->
                            <!-- End custom input -->

                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $options = json_decode($row->details);
                                    $display_options = isset($options->display) ? $options->display : NULL;
                                @endphp
                                @if ($options && isset($options->legend) && isset($options->legend->text))
                                    <legend class="text-{{$options->legend->align or 'center'}}" style="background-color: {{$options->legend->bgcolor or '#f0f0f0'}};padding: 5px;">{{$options->legend->text}}</legend>
                                @endif
                                @if ($options && isset($options->formfields_custom))
                                    @include('voyager::formfields.custom.' . $options->formfields_custom)
                                @else
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width or 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        {{ $row->slugify }}
                                        <label for="name">{{ $row->display_name }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @if($row->type == 'relationship')
                                            @include('voyager::formfields.relationship')
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                e.preventDefault();
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataType->slug }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
