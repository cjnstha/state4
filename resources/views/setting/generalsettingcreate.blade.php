@extends('layouts.master')
    @section('content')

        <div class="x_panel">
            <div class="x_title">
                <h2>Create General Setting</h2>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br />
                {{Form::open(['url'=>'settings/generalsetting', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate', 'files'=> 'true'])}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Title<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Enter Site Title'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">TagLine</label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('tagline',null,['class'=>'form-control', 'placeholder'=>'Enter Site Tagline'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Admin Email<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Enter Email'])}}
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Meta Title<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::text('meta_title',null,['class'=>'form-control', 'placeholder'=>'Enter Meta Title'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Meta Keyword<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::textarea('meta_keyword',null,['class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Enter Meta Keyword'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Meta Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            {{Form::textarea('meta_desc',null,['class'=>'form-control', 'rows'=>'4', 'placeholder'=>'Enter Meta Description'])}}
                        </div>
                    </div> --}}

                    

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="preview-logo-wrap">
                                <div class="preview-logo">
                                    <img class="hide" id="previewLogo" src="#" alt="Logo" />
                                </div>
                            </div>

                            <div class="browse input-group image-browse-btn">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse
                                         <input type="file" name="uploadLogo" id="imgLogo" accept="image/*" class="image-upload" onchange="readLogoURL(this);">
                                    </span>
                                </label>
                                
                            </div>


                            <!-- <input type="file" name="uploadLogo" id="imgLogo" accept="image/*" class="image-upload" onchange="readLogoURL(this);"> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Favicon<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-7 col-xs-12">
                            <div class="preview-logo-wrap favicon">
                                <div class="preview-logo">
                                     <img class="hide" id="previewFavicon" src="#" alt="Favicon"/>
                                </div>
                            </div>
                            <div class="browse input-group image-browse-btn">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        <i class="fa fa-folder-open"></i>
                                        Browse
                                         <input type="file" name="uploadFavicon" id="imgFav" accept="image/*" class="image-upload2" onchange="readFaviconURL(this);">
                                    </span>
                                </label>
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <div class="form-group" >
                            <div class="submit-btn col-md-6 col-md-offset-3 col-sm-offset-3">
                                <button type="submit"  class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>

                {{-- </form> --}}
                {{Form::close()}}
            </div>
        </div>

    @endsection
