
<div class="col-md-12">


                    <form method="post" action="<?php echo e(route('cv.updateQuesObj')); ?>" onsubmit="return submitForm()">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="empQuesObjId" value="<?php echo e($employeeCareerInfo->id); ?>">

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Career objective <span style="color: blue">(Max Limit 2500 character)</span></label>
                                <textarea type="text" name="objective" maxlength="2500"  rows="10" class="form-control<?php echo e($errors->has('objective') ? ' is-invalid' : ''); ?>"  id="objective" placeholder="Career Objective"><?php echo e($employeeCareerInfo->objective); ?></textarea>
                                <?php if($errors->has('objective')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('objective')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-6">


                                <label for=""><?php echo e(CAREER_QUES['Ques0']); ?><span style="color: red">*</span></label>
                                <div class="col-md-10 mb-10">
                                    <input class="form-check-input" type="radio" required  name="freshers" value="1" <?php if(count($employeeCvQuesObjQuesAns)>0): ?> checked <?php endif; ?>   onclick="checkFreshers()"> Yes&nbsp;&nbsp;
                                </div>
                                <div class="col-md-10">
                                    <input class="form-check-input" type="radio" required  name="freshers" <?php if(count($employeeCvQuesObjQuesAns)==0): ?> checked <?php endif; ?> onclick="hideFresher()" value="0"> No&nbsp;&nbsp;
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Possible joining date</label>
                                <input type="text" class="date" onkeypress="return isNumberKey(event)" placeholder="Possible Joining Date" value="<?php echo e($employeeCareerInfo->readyToJoinAfter); ?>" name="readyToJoinAfter">
                            </div>


                        </div>

                        <div class="form-group">















                        </div>
                            <div id="compulsoryQuestions">


                            



                                

                                
                                        

                                



                                    
                                    
                                        

                                        
                                        

                                            
                                        
                                    
                                        
                                    

                                    

                                




                            



                            
                                
                                    
                                    
                                
                            
                        </div>



                        <div style="overflow:auto;">
                            <div style="float:right;">

                                
                                <button class="btn-danger pull-left" onclick="<?php echo e(route('candidate.cvQuesObj')); ?>">Cancel</button>&nbsp;&nbsp;
                                <button type="submit" id="submitBtn">Save</button>


                            </div>
                        </div>

                    </form>

</div>

<script type="text/javascript">
    $(function () {
        // $('#compulsoryQuestions').hide();
        $('.date').datepicker({
            format: 'yyyy-m-d'
        });

        // if($('#freshers').attr('checked')){
        //     $('#compulsoryQuestions').show();
        // }
        //
        // else {
        //     // $('#compulsoryQuestions').hide();
        // }
        <?php if(count($employeeCvQuesObjQuesAns)>0): ?>
        checkFreshers();

        <?php else: ?>
        hideFresher();

        <?php endif; ?>


    });

    function submitForm() {
        // objective
        var obj=$('#objective').val();
        // alert(obj.length);
        //
        // return false;
        if(obj.length>2500){

            $.alert({
                title: 'Error',
                type: 'red',
                content: "Objective should not exceed more than 2500 character",
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {

                        }
                    }
                }
            });
            return false;
        }
        return true;
    }

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function checkFreshers() {

        $('#compulsoryQuestions').html('<?php $st=1;?>\n' +
            '\n' +
            '\n' +
            '\n' +
            '                                <?php $__currentLoopData = $employeeCvQuesObjQues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empCvObjQues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n' +
            '\n' +
            '                                <?php if($employeeCvQuesObjQuesAns->where("fkqusId",$empCvObjQues->id)->first()): ?>\n' +
            '                                        <input type="hidden" name="id<?php echo e($st); ?>" value="<?php echo e($employeeCvQuesObjQuesAns->where("fkqusId",$empCvObjQues->id)->first()->id); ?>">\n' +
            '\n' +
            '                                <?php endif; ?>\n' +
            '\n' +
            '\n' +
            '\n' +
            '                                    <input type="hidden" name="qesId<?php echo e($st); ?>" value="<?php echo e($empCvObjQues->id); ?>">\n' +
            '                                    <div class="form-group">\n' +
            '                                        <label for="">Ques-<?php echo e($st); ?>: <?php echo e($empCvObjQues->ques); ?><span style="color: red">*</span></label>\n' +
            '\n' +
            '                                        <textarea type="text" name="CareerQues<?php echo e($st); ?>" maxlength="300" required rows="3" class="form-control" id="CareerQues<?php echo e($st); ?>" placeholder=""><?php echo e(old("CareerQues".$st)); ?><?php if($employeeCvQuesObjQuesAns->where("fkqusId",$empCvObjQues->id)->first()): ?><?php echo e($employeeCvQuesObjQuesAns->where("fkqusId",$empCvObjQues->id)->first()->ans); ?> <?php endif; ?></textarea>\n' +
            '                                        <?php if($errors->has("CareerQues".$st)): ?>\n' +
            '\n' +
            '                                            <span class="">\n' +
            '                                        <strong><?php echo e($errors->first("CareerQues".$st)); ?></strong>\n' +
            '                                    </span>\n' +
            '                                        <?php endif; ?>\n' +
            '                                    </div>\n' +
            '\n' +
            '                                    <?php $st++;?>\n' +
            '\n' +
            '                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n' +
            '                            <?php $nt=$st; ?>\n' );



    }

    function hideFresher() {
        $('#compulsoryQuestions').html('');

    }



</script>
