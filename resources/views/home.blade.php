@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard Cek Ongkir - Raja Ongkir</div>
                <div class="card-body">
                    <!-- Data wilayah asal -->
                    <div class="form-group row">
                        <!-- Provinsi Asal -->
                        <label for="name" class="col-md-2 col-form-label text-md-right">Provinsi Asal</label>
                        <div class="col-md-4">
                            <select id="provAsal" class="form-control" name="provAsal">
                                @foreach($dataProvinsi as $provinsiAsal)
                                    <option value="{{$provinsiAsal->province_id}}">{{ $provinsiAsal->province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Kota Asal -->
                        <label for="name" class="col-md-2 col-form-label text-md-right">Kota / Kabupaten Asal</label>
                        <div class="col-md-4">
                            <select id="kokabAsal" class="form-control" name="kokabAsal">
                            </select>
                        </div>
                    </div>

                    <!-- Data wilayah tujuan -->
                    <div class="form-group row">
                        <!-- Provinsi Tujuan -->
                        <label for="name" class="col-md-2 col-form-label text-md-right">Provinsi Tujuan</label>
                        <div class="col-md-4">
                            <select id="provTujuan" class="form-control" name="provTujuan">
                                @foreach($dataProvinsi as $provinsiAsal)
                                    <option value="{{$provinsiAsal->province_id}}">{{ $provinsiAsal->province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Kota Tujuan -->
                        <label for="name" class="col-md-2 col-form-label text-md-right">Kota Tujuan</label>
                        <div class="col-md-4">
                        <select id="kokabTujuan" class="form-control" name="kokabTujuan">
                            </select>
                        </div>
                    </div>
                    <div class="my-5"></div>
                    <hr>
                    <div class="my-5"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('#provAsal').change(function(){
    var provAsal = $(this).val();    
    //console.log(provAsal);
    if(provAsal){
        $.ajax({
           type:"GET",
           url:"/getkokabAsal?provAsal="+provAsal,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kokabAsal").empty();
                $("#kokabAsal").append('<option>---Kota / Kabupaten---</option>');
                $.each(res,function(index,item){
                    $("#kokabAsal").append('<option value="'+item.city_id+'">'+item.type+' '+item.city_name+'</option>');
                });
            }else{
               $("#kokabAsal").empty();
            }
           }
        });
    }else{
        $("#kokabAsal").empty();
    }      
   });

   $('#provTujuan').change(function(){
    var provTujuan = $(this).val();    
    //console.log(provTujuan);
    if(provTujuan){
        $.ajax({
           type:"GET",
           url:"/getkokabTujuan?provTujuan="+provTujuan,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kokabTujuan").empty();
                $("#kokabTujuan").append('<option>---Kota / Kabupaten---</option>');
                $.each(res,function(index,item){
                    $("#kokabTujuan").append('<option value="'+item.city_id+'">'+item.type+' '+item.city_name+'</option>');
                });
            }else{
               $("#kokabTujuan").empty();
            }
           }
        });
    }else{
        $("#kokabTujuan").empty();
    }      
   });
</script>
@endsection
