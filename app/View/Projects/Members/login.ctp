<div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <?php echo $this->Form->create('Member');?>
                            <div class="form-group">
                                <?php echo $this->Form->input('username',array('class'=>'form-control','placeholder'=>'Enter username'));?>
                            </div>
                            <div class="form-group">
                                 <?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Enter password', 'type'=>'password'));?>
                            </div>
                            <?php echo $this->Form->submit('Login', array('class'=>'btn btn-default'));?>
                        <?php echo $this->Form->end();?>
                    </div>
                    <div class="col-md-7">
                        <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
                    </div>
                </div>
            </div>