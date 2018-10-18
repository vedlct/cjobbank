@extends('main')
@section('content')

       <div class="container-fluid">
           <div class="row">
               <div class="col-md-2">
                   <div class="card">
                       <div class="card-body">
                           <div class=" form-group ">
                               <label>Personal Mobile</label>&nbsp;<span style="color: red">(Year)</span>
                               <input class="form-control" id="personalMobile" name="personalMobile" onkeypress="return isNumberKey(event)" type="text">
                           </div>
                           <div class=" form-group ">
                               <label>Email</label>&nbsp;<span style="color: red">(Year)</span>
                               <input class="form-control" id="Email" name="Email" onkeypress="return isNumberKey(event)" type="text">
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-10">
                   <div class="card">
                       <div class="card-body">
                           <div class="table table-responsive">
                               <table id="shoQuesAns" class="table table-striped table-bordered" style="width:100%" >
                                   <thead>
                                   <tr>
                                       <th>Name</th>
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
                $('#shoQuesAns').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        "url": "{!! route('manage.applicantQuestionAnswer') !!}",
                        "dataType": "json",
                        "type": "POST",
                        "data":{ _token: "{{csrf_token()}}"}
                    },
                    "columns": [
                        { "data": "name",name:"name" },
                        { "data": "qus",name:"qus" },
                        { "data": function(data){
                                if( data.ans == "Y2"){
                                    return "Yes"
                                }else if (data.ans == "N2") {
                                    return "No"
                                }
                                else{
                                    return "Na"
                                }



                            },
                            "orderable": true, "searchable":true,
                        },
                    ]

                });
            });

        </script>
        @endsection
