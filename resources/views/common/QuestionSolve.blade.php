@extends("layouts.index")
@section('title')
Question Solving
@endsection('title')
@section('content')
<style type="text/css">
    
            #difficulty0,#thinking_based0,#variant_content0 {
              opacity: 0;
              width: 0;
              float: left;
            }

            .rec_q {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 300px;
            }


</style>
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head row pb-4" style="background-image: url(./assets/app/media/img//logos/bg-6.jpg);" id="head">
                                    <div class="m-invoice__container col-md-8" >             
                                        <form id="correct"  method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="put"/>
                                            <input name="id" type="hidden" value="{{$_GET['id']}}"/>
                                            <div class="submit_exam m-invoice__items" >
                                                <!-- QUESTION NAME AND ANSWER ITEMS FILLED BY JAVASCRIPT -->
                                                <!--begin::Portlet-->
                                            </div>
                                        </form>

                                    </div>
                                    <!-- recommended questions with javascript -->
                            </div>
                            
                            <div class="m-invoice__footer" style=" margin-top:-18px;">
                                <div class="m-invoice__table m-invoice__table--centered table-responsive" id="buttons_area" >
                                    <button class="submit_exam btn btn-success" id="submit_ex"  onclick="correct('{{$_GET['id']}}')"  type="button">
                                        Submit Answer
                                    </button>

                                </div>
                                <div style="display:none" class="m-invoice__table m-invoice__table--centered table-responsive mt-3" id="execution_result_container">
                                    <h3>Result:</h3>
                                    <h4 id="execution_result"></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------------->
@endsection

@section('script')
<script type="text/javascript" tablename="QuestionSolve" _id="{{$_GET['id']}}" website_url="{{url("")}}" csrf="{{csrf_token()}}"src="{{url("js/common/QuestionSolve.js")}}"></script>
@endsection

