<div class="card shadow py-2">
    <div class="card-body">
    <a href="<?php echo base_url()."pages/table" ?>" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Back to table</a>
    <hr>
        <form action="">
            <label>Input Text</label>
            <input type="text" class="form-control">
            <br>
            <label>Select</label>
            <select name="" id="" class="form-control select2">
                <option value="">---Option---</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <br>
            <br>
            <label>Datapicker</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                </div>
                <input type="text" class="datepicker form-control">
            </div>
            <label>Upload File</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <br>
            <br>
            <label>Textarea</label>
            <textarea  cols="30" rows="5" class="form-control"></textarea>
            <br>
            <?php 
                $this->load->view("common/btn");
            ?>
        </form>
    </div>
</div>
