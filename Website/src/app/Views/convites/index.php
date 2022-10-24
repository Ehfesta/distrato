<!-- css -->
<link rel="stylesheet" href="<?= base_url() ?>/resources/css/Convite/style.css?v=<?=getenv('Version')?>">
<!-- js -->
<script src="<?= base_url() ?>/resources/js/Convites/index.js?v=<?=getenv('Version')?>"></script>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"><small></small></h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <!-- <button type="button" onclick="bntListaConvite();" class="btn btn-outline-primary btn-sm ml-2"><i class="fa fa-list"> Lista</i></button> -->
                        <!-- <button type="button" onclick="TesteDashboard();" class="btn btn-outline-primary btn-sm bntNovo ml-2"><i class="fa fa-plus"> Novo</i></button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" style="margin: auto;">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row" id="tableCard" style="justify-content: space-between;">

                </div>
            </div>
        </div>
    </div>
</div>