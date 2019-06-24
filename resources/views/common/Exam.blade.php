@extends("layouts.index")
@section("title")
@php $tablename="Exam" @endphp
{{$tablename}}
@endsection
@section("content")
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											{{$tablename}}
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<a href="#" onclick="actions()" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" id="modal_button" data-toggle="modal" data-target="#m_modal_4">
												<span>
													<i class="la la-cart-plus"></i>
													<span>New Question</span>
												</span>
											</a>
										</li>
										<li class="m-portlet__nav-item">
											<a href="#" onclick="actions()" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" id="modal_button" data-toggle="modal" data-target="#m_modal_4">
												<span>
													<i class="la la-cart-plus"></i>
													<span>Select question from DB</span>
												</span>
											</a>
										</li>
										<li class="m-portlet__nav-item"></li>
									</ul>
								</div>
							</div>
							<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="" id="m_table_1">

								</table>
							</div>

						<!-- END EXAMPLE TABLE PORTLET-->

						<!-- Start::modal form-->
						<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">New question</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="Question" method="post" enctype="multipart/form-data" id="form_add">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="post" fillable="never"/>

										<div id="test">

											{{csrf_field()}}
											<input type="hidden" name="_method" value="post" fillable="never"/>
											<div class="m-portlet__body">
											    <div id="test">
													<div>

														<div class="form-group m-form__group">
													        <label for="exampleInputEmail1" id="question_label">Programming</label>
													            <select id="is_programming" name="is_programming" class="form-control m-input" id="exampleSelect1">

													            	<option selected value="no">no</option>
													            	<option value="Yes">Yes</option>
													            </select>
													    </div>
													</div>

													<div class="form-group m-form__group" id="program_language_div">
													        <label for="program_language" id="prog_lng_label">Programming Language</label>
													            <select id="program_language" name="program_language" class="form-control m-input" id="exampleSelect1">

													            	<option selected value="cpp">c++</option>
													            	<option value="c">c</option>
													            	<option value="php">PHP</option>
													            	<option value="py">Python</option>
													            </select>
													    </div>
													</div>

											        <div class="form-group m-form__group">
											            <label for="exampleInputEmail1" id="question_label">Question</label>
											            <textarea class="ignoreField form-control m-input qbank" name="name" id="question"
											                      placeholder="Question"></textarea>
											        </div>
															<!-- in case of programming -->
															<!-- programming_output -->
													       <div id="essay_answer" style="display: none" class="form-group m-form__group">
												            <label for="exampleInputEmail1">Answer</label>
												            <textarea class="ignoreField form-control m-input qbank" name="answer_id" id="answer_id"
												                      placeholder="Answer"></textarea>
												        </div>


											        <div id="answers1">
											            <div class="form-group m-form__group">
											                <label for="exampleInputPassword1"> answers </label>
											                <a href="#" id="addanswer" class="btn btn-success ">add answer </a>
											            </div>
											            <div id="answer" style="margin-top:10px;">
											                <div class="form-group m-form__group row">
											                    <div class="col-lg-12 col-md-12 col-sm-12">
											                        <div class="input-group pull-right ">
											                            <div class="col-md-8">
											                                <input class="form-control m-input m-input--air answer" type="text" placeholder="answer"
											                                       name="answer[0]">
											                            </div>
											                            <div class="col-md-2">
											                                <label for="is_true">true</label>
											                                <input class="checkbox" value="1" type="checkbox"
											                                       id="is_true" name="is_true[0]">
											                            </div>
											                        </div>
											                    </div>
											                </div>
											                <div class="form-group m-form__group row">
											                    <div class="col-lg-12 col-md-12 col-sm-12">
											                        <div class="input-group pull-right ">
											                            <div class="col-md-8">
											                                <input class="form-control m-input m-input--air answer" type="text" placeholder="answer"
											                                       name="answer[1]">
											                            </div>
											                            <div class="col-md-2">
											                                <label for="is_true">true</label>
											                                <input class="checkbox" value="1" type="checkbox"
											                                       id="is_true" name="is_true[1]">
											                            </div>

											                        </div>
											                    </div>
											                </div>
											            </div>
											        </div>

											        <div class="form-group m-form__group">
											            <label for="exampleInputEmail1">tags <small>comma separated</small></label>
											            <a href="#" id="generate_tags" class="btn btn-success ">auto generate</a>
																	<textarea class="ignoreField form-control m-input" name="tags" id="tags"
											                      placeholder="tags"></textarea>
															</div>

											    </div>
											</div>

                                        </div>

                                  <input type="hidden" name="exam_id" value="{{$_GET['exam_id']}}"/>
						        <input style="display: none" type="reset" id="form_reset" class="btn btn-secondary">
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Add question</button>
						      </div>
						        </form>
						      </div>

						    </div>
						  </div>
						</div>

						<!-- End::modal form-->
						</div>
    <form method="post" id="delete_form">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="delete"/>
    </form>

@endsection
@section("script")
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" tablename="Question" examTable="{{$tablename}}" exam_id="{{$_GET['exam_id']}}" src="{{url("js/common/".$tablename.".js")}}"></script>
@endsection