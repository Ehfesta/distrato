<html lang="en" style="height: auto;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Advanced form elements</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css?v=<?=getenv('Version')?>">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css?v=<?=getenv('Version')?>">

    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
    
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">

        <div class="content-wrapper" style="min-height: 1345.31px;">

            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Bootstrap Switch</h3>
                                </div>
                                <div class="card-body">
                                    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 86px;">
                                        <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch=""></div>
                                    </div>
                                    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 86px;">
                                        <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-danger" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    

                </div>

            </section>

        </div>

       

        
    </div>


    <script src="../../plugins/jquery/jquery.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/select2/js/select2.full.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/moment/moment.min.js?v=<?=getenv('Version')?>"></script>
    <script src="../../plugins/inputmask/jquery.inputmask.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/daterangepicker/daterangepicker.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/bs-stepper/js/bs-stepper.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../plugins/dropzone/min/dropzone.min.js?v=<?=getenv('Version')?>"></script>

    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="../../dist/js/demo.js?v=<?=getenv('Version')?>"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script><input type="file" multiple="multiple" class="dz-hidden-input" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">


    <div class="daterangepicker ltr show-calendar opensright">
        <div class="ranges"></div>
        <div class="drp-calendar left">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-calendar right">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="daterangepicker ltr show-calendar opensright">
        <div class="ranges"></div>
        <div class="drp-calendar left">
            <div class="calendar-table"></div>
            <div class="calendar-time"></div>
        </div>
        <div class="drp-calendar right">
            <div class="calendar-table"></div>
            <div class="calendar-time"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="daterangepicker ltr show-ranges opensright">
        <div class="ranges">
            <ul>
                <li data-range-key="Today">Today</li>
                <li data-range-key="Yesterday">Yesterday</li>
                <li data-range-key="Last 7 Days">Last 7 Days</li>
                <li data-range-key="Last 30 Days">Last 30 Days</li>
                <li data-range-key="This Month">This Month</li>
                <li data-range-key="Last Month">Last Month</li>
                <li data-range-key="Custom Range">Custom Range</li>
            </ul>
        </div>
        <div class="drp-calendar left">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-calendar right">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
</body>

</html>