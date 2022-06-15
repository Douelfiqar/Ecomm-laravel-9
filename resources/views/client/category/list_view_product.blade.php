@foreach ($ProductFiltreds as $ProductFiltred)
                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                            <div class="products">
                              <div class="product">
                                <div class="product-image">
                                  <div class="image"> <a href="{{url('/client/home/details/'.$ProductFiltred->id)}}"><img  src="{{asset('upload/productPhoto/'.$ProductFiltred->product_thambnail)}}" alt=""></a> </div>
                                  <!-- /.image -->
                                  
                                </div>
                                <!-- /.product-image -->
                                
                                <div class="product-info text-left">
                                  <h3 class="name"><a href="{{url('/client/home/details/'.$ProductFiltred->id)}}"> @if (session()->get('lang')=='francais')
                                    {{$ProductFiltred->product_name_fr}}
                                    @else
                                    {{$ProductFiltred->product_name_en}}
                                    @endif</a></h3>
                                  <div class="rating rateit-small"></div>
                                  <div class="description"></div>
                                  <div class="product-price"> @if ($ProductFiltred->discount_price)
                                    <span class="price-before-discount">{{$ProductFiltred->selling_price}} </span>
                                    <span class="price">DH {{$ProductFiltred->discount_price}} </span>  
                                    @else 
                                    <span class="price">DH {{$ProductFiltred->selling_price}} </span> 
                
                                    @endif </div>
                                  <!-- /.product-price --> 
                                  
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                  <div class="action">
                                    <ul class="list-unstyled">
                                      <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onClick="viewProduct(this.id,1)" id='{{$ProductFiltred->id}}'> <i class="fa fa-shopping-cart"></i> </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        
                                      </li>
                                      <li class="add-cart-button "> <button data-toggle="tooltip" class="btn btn-primary icon" id='{{$ProductFiltred->id}}' onclick="addToWish(this.id)" title="Wishlist"> <i class="icon fa fa-heart"></i> </button> </li>
                                      <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                    </ul>
                                  </div>
                                  <!-- /.action --> 
                                </div>
                                <!-- /.cart --> 
                              </div>
                              <!-- /.product --> 
                              
                            </div>
                            <!-- /.products --> 
                          </div>
@endforeach
