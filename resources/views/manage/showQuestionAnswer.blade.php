@extends('main')
@section('content')

       <div class="container-fluid">
           <div class="row">
               {{--<div class="col-md-2">--}}
                   {{--<div class="card">--}}
                       {{--<div class="card-body">--}}
                           {{--<div class=" form-group ">--}}
                               {{--<label>Personal Mobile</label>&nbsp;--}}

                               {{--<input class="form-control" id="personalMobileFilter" onkeypress="return isNumberKey(event)"  name="personalMobile"  type="text">--}}
                           {{--</div>--}}
                           {{--<div class=" form-group ">--}}
                               {{--<label>Email</label>--}}
                               {{--<input class="form-control" id="emailFilter" name="email"  type="text">--}}

                           {{--</div>--}}

                       {{--</div>--}}
                   {{--</div>--}}
               {{--</div>--}}
               <div class="col-md-12">
                   <div class="card">
                       <div class="card-body">
                           <div class="table table-responsive">
                               <table id="shoQuesAns" class="table table-striped table-bordered" style="width:100%" >
                                   <thead>
                                   <tr>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Question</th>
                                       <th>Ans</th>
                                   </tr>
                                   </thead>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>


    </div>
   @endsection

    @section('foot-js')
        <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        {{--<script src="{{url('public/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>--}}
        {{--<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>--}}
        {{--<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>--}}
        <script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script>
            $(document).ready(function () {
              var table= $('#shoQuesAns').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        "url": "{!! route('manage.applicantQuestionAnswer') !!}",
                        "dataType": "json",
                        "type": "POST",
                        data:function (d){

                            d._token="{{csrf_token()}}";
                            // if ($('#personalMobileFilter').val()!=""){
                            //     d.personalMobileFilter=$('#personalMobileFilter').val();
                            // }
                            // if ($('#emailFilter').val()!=""){
                            //     d.emailFilter=$('#emailFilter').val();
                            // }
                        },
                    },
                    "columns": [
                        { "data": "name",name:"name"},
                        { "data": "email",name:"email"},
                        { "data": "qus",name:"qus" },
//                        { "data": "ans",name:"ans" },
                        { "data": function(data){
                                if( data.ans == "Y"){
                                    return "Yes"
                                }else if (data.ans == "N") {
                                    return "No"
                                }
                                else{
                                    return "Na"
                                }

                            },
                            "orderable": true, "searchable":true,
                        },

                    ],

            });
                // $("#personalMobileFilter").keyup(function(){
                //     // table.search("").draw(); //just redraw myTableFilter
                //     table.ajax.reload();  //just reload table
                //
                //
                // });
                // $("#emailFilter").keyup(function(){
                //     // table.search("").draw(); //just redraw myTableFilter
                //     table.ajax.reload();  //just reload table
                //
                //
                // });
            });

            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }



        </script>
        @endsection
