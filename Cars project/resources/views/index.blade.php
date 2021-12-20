
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cars</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset("css/styles.css") }}" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset("https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css") }}">
    <!-- jQuery library -->
    <script src="{{ asset("https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js") }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js") }}"></script>
    <!-- Latest compiled JavaScript -->
    <script src="{{ asset("https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js") }}"></script>
</head>


<body>

    <div class ="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 bg-light mt-5 p-4 rounded">
                <form >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select class="form-control form-control-lg manufacturer">
                            <option value="0" disabled selected>Select manufacturer</option>
                            @foreach($manu as $m)
                                <option value="{{$m->idManufacturer}}">{{$m->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg model">

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" name="saveBtn"  id="saveBtn" class="btn btn-danger btn-block btn-sm">Save car</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="container-fuild">
        <div class="card-body">
            <div class="table-responsive col-md-13" id="carTable">


            </div>


        </div>


    </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $(document).on("change", ".manufacturer", function(){
            let id= $(this).val();

            $.ajax({
                url:"/models",
                method:"Get",
                data:{
                    id:id
                },
                success: function(data){
                    let print = "<option value='' disabled selected>Select car model</option>>";
                    for(let model of data){
                        print += `<option value="${model.idModel}">${model.name}</option>`;
                    }

                    $(".model").html(print);

                },
                error: function(xhr, status, statusText){
                    console.error('----> ERROR <----');
                    console.log(statusText);
                }


            })
        })

        document.querySelector("#saveBtn").addEventListener("click", function(){

            let manufacturerId = $(".manufacturer").val();
            let modelId = $(".model").val();

            $.ajax({
                url:"/store",
                method:"POST",
                dataType: "json",
                data:{
                    "_token": "{{ csrf_token() }}",
                    saveBtn : true,
                    manufacturerId, modelId
                },
                success: function(data){
                    printTable(data)

                },
                error: function(xhr, status, statusText){
                    console.error('----> ERROR <----');
                    console.log(statusText);
                }


            })

        })

            $.ajax({

                url: '/index' ,
                method: 'GET',
                success: function(data,status, xhr){
                        printTable(data);


                  },
                 error: function(xhr, status, statusText){
                     console.error('----> ERROR <----');
                    console.log(statusText);

                     }
                     })










    });
    function printTable(data){
        let print ="<table class= 'table'><thead><th>Car manufacturer</th><th>Car model</th><thead><tbody >";
        for(let car of data){
            print += `<tr><td>${ car.manuName }</td>
                       <td>${ car.modelName }</td></tr>`

        }
        print += "</tbody></table>"
        $("#carTable").html(print);
    }

    </script>

<script>


</script>
</body>

</html>
