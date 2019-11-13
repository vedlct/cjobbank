
<div class="col-md-12">


                    <form method="post" action="<?php echo e(route('cv.updateQuesObj')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="empQuesObjId" value="<?php echo e($employeeCareerInfo->id); ?>">

                            <div class="form-group">
                                <label for="">Objective<span style="color: red">*</span></label>
                                <textarea type="text" name="objective" maxlength="200" required rows="2" class="form-control<?php echo e($errors->has('objective') ? ' is-invalid' : ''); ?>"  id="objective" placeholder="Career Objective"><?php echo e($employeeCareerInfo->objective); ?></textarea>
                                <?php if($errors->has('objective')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('objective')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Ques-1: <?php echo e(CAREER_QUES['Ques1']); ?><span style="color: red">*</span></label>
                                <textarea type="text" name="CareerQues1" maxlength="200" required rows="3" class="form-control <?php echo e($errors->has('CareerQues1') ? ' is-invalid' : ''); ?>" id="CareerQues1" placeholder="Career Question"><?php echo e($employeeCareerInfo->ques_1); ?></textarea>
                                <?php if($errors->has('CareerQues1')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('CareerQues1')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="">Ques-2: <?php echo e(CAREER_QUES['Ques2']); ?><span style="color: red">*</span></label>
                                <textarea type="text" name="CareerQues2" maxlength="200" required rows="3" class="form-control <?php echo e($errors->has('CareerQues2') ? ' is-invalid' : ''); ?>" id="CareerQues2" placeholder="Career Question"><?php echo e($employeeCareerInfo->ques_2); ?></textarea>
                                <?php if($errors->has('CareerQues2')): ?>

                                    <span class="">
                                        <strong><?php echo e($errors->first('CareerQues2')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a class="btn btn-danger pull-left" href="<?php echo e(route('candidate.cvQuesObj')); ?>">Cancel</a>&nbsp;&nbsp;
                                <button type="submit" id="submitBtn">Save</button>


                            </div>
                        </div>

                    </form>

</div>