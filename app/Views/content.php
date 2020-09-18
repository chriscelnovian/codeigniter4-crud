<!-- Content -->
<div class="container-fluid">
    <div class="row">
        <div class="content-page">

            <!-- Data Header -->
            <div class="content-header">

                <!-- Data Header Title -->
                <h4 class="card-title">Room Data</h4>

                <!-- Button Add Room -->
                <button class="btn btn-primary content-btn-add" type="submit" data-toggle="modal" data-target="#modalAddRoom">
                    Add
                </button>

                 <!-- Modal Add Room -->
                <div id="modalAddRoom" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="col-12 modal-title text-center">
                                    <span>Add Room</span>
                                    <button class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                                </h4>	
                            </div>
                        
                            <!-- Modal Body -->
                            <div class="modal-body"> 
                                <form class="form-horizontal" role="form" method="post" action="<?= site_url('main/add');?>">

                                    <!-- Room Name -->
                                    <div class="col-12">
                                        <input type="text" name="roomName" class="form-control" required>
                                    </div>

                                    <br>

                                    <!-- Button Add -->
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary content-btn-add">Add</button>
                                    </div>
                                    
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Data Content -->
            <div class="row">

                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        
                        <!-- Table Head -->
                        <thead class="thead-light text-center">
                            <tr>
                                <th class="content-table-no">#</th>
                                <th class="content-table-name">Name</th>
                                <th class="content-table-action">Action</th>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach($room_list as $key => $room) { ?>

                            <tr>
                                <!-- Order Number -->
                                <td class="align-middle text-center"><?= $key + 1; ?></td>

                                <!-- Room Name -->
                                <td class="align-middle"><?= $room['name'];?></td>

                                <!-- Action Menu -->
                                <td class="align-middle d-flex justify-content-center">
                                    
                                    <!-- Edit -->
                                    <button class="btn btn-sm btn-primary mr-4 px-3" data-toggle="modal" data-target="#modalEditRoom<?= $room['id']; ?>">
                                        Edit
                                    </button>

                                    <!-- Remove -->
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDeleteRoom<?= $room['id'];?>">
                                        Remove
                                    </button>

                                </td>

                                <!-- Modal Edit Room -->
                                <div id="modalEditRoom<?= $room['id']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="col-12 modal-title text-center">
                                                    Edit Room
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </h4>	
                                            </div>
                                        
                                            <!-- Modal Body -->
                                            <div class="modal-body"> 
                                                <form class="form-horizontal" role="form" method="post" action="<?= site_url('main/edit'.'/'.$room['id']);?>">

                                                    <!-- Room Name -->
                                                    <div class="col-12">
                                                        <input type="text" name="roomName" class="form-control" value="<?= $room['name']; ?>" required>
                                                    </div>

                                                    <br>

                                                    <!-- Button Update-->
                                                    <div class="form-group text-center">
                                                        <button class="btn btn-primary">Update</button>
                                                    </div>
                                        
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Delete Room -->
                                <div id="modalDeleteRoom<?= $room['id']; ?>" class="modal fade">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body"> 
                                                <h4 class="text-center mb-5">Are you sure want to remove?</h4>
                                                <div class="d-flex justify-content-center">
                                                    <a class="mr-5" href="<?= site_url('main/remove'.'/'.$room['id']);?>">
                                                        <button class="btn btn-danger">Delete</button>
                                                    </a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>                                     
                                        </div>
                                    </div>
                                </div>

                            </tr>

                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>