<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <body>
        <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- partial -->
      

      <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


      <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">


        <table>
            <tr style="background-color: lightgreen;">
                <td style="padding:20px;">Couster name</td>
                <td style="padding:20px;">Phone</td>
                <td style="padding:20px;">Address</td>
                <td style="padding:20px;">Product title</td>
                <td style="padding:20px;">Price</td>
                <td style="padding:20px;">Quantity</td>
                <td style="padding:20px;">Status</td>
                <td style="padding:20px;">Action</td>
            </tr>

            <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr align="center" style="background-color: black;">
                <td style="padding:20px;"><?php echo e($orders->name); ?></td>
                <td style="padding:20px;"><?php echo e($orders->phone); ?></td>
                <td style="padding:20px;"><?php echo e($orders->address); ?></td>
                <td style="padding:20px;"><?php echo e($orders->product_name); ?></td>
                <td style="padding:20px;"><?php echo e($orders->price); ?></td>
                <td style="padding:20px;"><?php echo e($orders->quantity); ?></td>
                <td style="padding:20px;"><?php echo e($orders->status); ?></td>
                <td style="padding:20px;">
                    <a class="btn btn-success" href="<?php echo e(url('updatestatus',$orders->id)); ?>">Delivered</a>
                </td>


            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>



        </div>
      </div>
        <!-- partial -->
        
          <!-- partial -->
        <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html><?php /**PATH C:\Users\Farhan Alvi\Desktop\demo\E-Commerce\resources\views/admin/showorder.blade.php ENDPATH**/ ?>