@extends('layouts.header')
@section('title')
room
@endsection

@section('content')

<div class = "seach_cart">
            
        <div class ="seach_second">
        <div class="seach_border text-light">
            <div class="seach_block">
                <h3 id = "w_b" class="text-center" style="margin:auto; color:white">HOME</h3>

                <div class="seach_block">
                <p id = "w_b" class="text-center" style="margin:auto">Find the best room on SiteName</p>
                </div>
                
            </div>

            <!-- filter form -->
            <div class="row gy-2">
                <div class="col-md-6 col-sm-12 text-md-end ">
                    <input id="sdate" type="date" placeholder="Arrivel date"class="form-control @error('sdate') is-invalid @enderror" name="sdate" required autocomplete="sdate" v-model="sdate"t>
                </div>
                <div class="col-md-6 col-sm-12">
                    <input id="sdate" type="date" placeholder="End date"class="form-control @error('fdate') is-invalid @enderror" name="fdate" required autocomplete="fdate" v-model="fdate"t>
                </div>

                <form method="POST" action="" class="row mx-1 py-3" style="padding:8 12; padding-right: 20px;">
                    <button type="button" class="btn btn-warning" >Order room</button>
                </form>
            </div>
        </div>
        </div>
</div>
        
<hr><!------------------------------------------------------------------>

<div id="body_main" class = "body_main row gx-5 gy-5">
<div class="container" style="margin-bottom: 10%;">
    <div class="row">
        <!-- left side -->
        <div class="col-md-5" style="margin-bottom: 5%;">
            <div class="card">
                <div class="row">
                    <h4 class="text-center">Deskription</h4>
                    <div class="px-3">
                        <hr>
                    </div>
                    <p  class="px-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo laudantium consequuntur, adipisci id itaque voluptates harum est numquam quidem, porro commodi odit possimus cupiditate sint repellat. Asperiores inventore perspiciatis excepturi.</p>
                </div>
                <ul class="list-group list-group-flush">
                    
                    <li class="list-group-item">Type:</li>
                    <li class="list-group-item">Categories:</li>
                </ul>
            </div>
        </div>
            
        <!-- right side -->
        <div class="col-md-7">
            <div class="card">
                
            <img src="http://www.tollesonhotels.com/wp-content/uploads/2017/03/image-result-for-sustainable-hotel-room.jpeg" class="img-fluid" alt="..." style="border-radius: 4px;">
            <ul class="list-group list-group-flush">
                    
                <li class="list-group-item">Addres:</li>
                <li class="list-group-item">Building:</li>
                <li class="list-group-item">Price:</li>
            </ul>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

