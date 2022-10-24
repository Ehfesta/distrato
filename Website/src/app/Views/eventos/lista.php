<!-- css -->
<link rel="stylesheet" href="<?= base_url() ?>/resources/css/Convite/style.css?v=<?=getenv('Version')?>">
<!-- js -->
<script src="<?= base_url() ?>/resources/js/Eventos/lista.js?v=<?=getenv('Version')?>"></script>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"><small></small></h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <button type="button" onclick="bntCardConvite();" class="btn btn-outline-primary btn-sm ml-2"><i class="fa fa-id-card"> Convite</i></button>
                        <!-- <button type="button" onclick="TesteDashboard();" class="btn btn-outline-primary btn-sm bntNovo ml-2"><i class="fa fa-plus"> Novo</i></button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" style="margin: auto;">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" aria-sort="descending" style="width: 110px;" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Data</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Título</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Descição</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" style="width: 115px;" rowspan="1" colspan="1">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableConvite">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 1 of 9 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
