
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>

    <!-- /.content-header -->
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Exam</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Title</h3>
  
                  <div class="card-tools">
                        <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add new</a>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                
                                <th>Exam</th>
                                <th>Exam Date</th>
                                <th>Result</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$std): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td><?php echo e($key+1); ?></td>
                                  <td><?php echo e($std['name']); ?></td>
                                  
                                  <td><?php echo e($std['ex_name']); ?></td>
                                  <td><?php echo e($std['exam_date']); ?></td>
                                  <td>
                                    <?php 
                                    if($std['exam_joined']==1){
                                    ?>
                                          <a href="<?php echo e(url('admin/admin_view_result/'.$std['id'])); ?>" class="btn btn-info btn-sm">View result</a>
                                    <?php    
                                    }
                                    ?>


                                  </td>
                                  <td><input type="checkbox" class="student_status" data-id="<?php echo e($std['id']); ?>" <?php if($std['std_status']==1){ echo "checked";} ?> name="status"></td>
                                  <td>
                                      
                                      <a href="<?php echo e(url('admin/delete_students/'.$std['id'])); ?>" class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-header -->

    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(url('admin/add_new_students')); ?>" class="database_operation">  
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Name</label>
                            <?php echo e(csrf_field()); ?>

                            <input type="text" required="required" name="name" placeholder="Enter name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter E-mail</label>
                            <?php echo e(csrf_field()); ?>

                            <input type="text" required="required" name="email" placeholder="Enter name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Mobile-no</label>
                            <?php echo e(csrf_field()); ?>

                            <input type="text" required="required" name="mobile_no" placeholder="Enter mobile-no" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Select exam</label>
                            <select class="form-control" required="required" name="exam">
                                <option value="">Select</option>
                                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($exam['id']); ?>"><?php echo e($exam['title']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">password</label>
                            <input type="password" required="required" name="password" placeholder="Enter password" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </form>
      </div>
      
    </div>
    </div>	


 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xaamp\htdocs\laravel-quiz-application\themes\dashboard\views/admin/manage_students.blade.php ENDPATH**/ ?>