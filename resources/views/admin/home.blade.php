@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  <router-link v-bind:to="{name: 'AddProduct'}">
                    Add Product
                  </router-link>
                  <router-link v-bind:to="{name: 'ListProduct'}">
                    List Product
                  </router-link>
                  <br />
                    <router-view>
                    </router-view>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
