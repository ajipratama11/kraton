<div class="card shadow py-2">
    <div class="card-body">
        <a href="<?php echo base_url()."pages/form" ?>" class="btn btn-primary mb-3"> <span class="fa fa-plus-circle"></span> Add New Record</a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered datatable table-custom">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Title 1</td>
                        <td>Title 2</td>
                        <td>Title 3</td>
                        <td>Title 4</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Title 1</td>
                        <td>Title 2</td>
                        <td>Title 3</td>
                        <td>Title 4</td>
                        <td>
                            <?php 
                                $dropdown['link'] = array(
                                    "Edit" => base_url(),
                                    "Detail" => base_url(),
                                    "Delete" => array(base_url()) 
                                );
                                $this->load->view("common/dropdown", $dropdown);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Title 1</td>
                        <td>Title 2</td>
                        <td>Title 3</td>
                        <td>Title 4</td>
                        <td>
                            <?php 
                                $dropdown['link'] = array(
                                    "Edit" => base_url(),
                                    "Detail" => base_url(),
                                    "Delete" => array(base_url()) 
                                );
                                $this->load->view("common/dropdown", $dropdown);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Title 1</td>
                        <td>Title 2</td>
                        <td>Title 3</td>
                        <td>Title 4</td>
                        <td>
                            <?php 
                                $dropdown['link'] = array(
                                    "Edit" => base_url(),
                                    "Detail" => base_url(),
                                    "Delete" => array(base_url()) 
                                );
                                $this->load->view("common/dropdown", $dropdown);
                            ?>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
