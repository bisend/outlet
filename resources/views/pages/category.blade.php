@extends('layout')

@section('content')

    @include('partial.breadcrumbs')

    <div class="category-section">
        <div class="container">
            <div class="row">
                <div class="show-filters-mobile">
                    <a href="javascript:void(0);" class="open-nav btn" data-menu-open-link-right>Фільтри</a>
                </div>
                <div class="col-md-12 col-lg-3 filters-mobile" id="filters-mobile">
                    <div class="left-navbar">
                        <div class="filters">
                            <div class="mobile-folters-header">
                                <div class="closebtn" data-menu-close-link-right>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </div>
                            </div>
                            <div class="dropdown-div">
                                <div class="dropdown-div-btn">
                                    Розмір
                                    <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </div>
                                <div class="dropdown-div-content">
                                    <ul>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr1" name="check" value="" />
                                                <label for="filtr1">
                                                    <span></span><a href="">22</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr2" name="check" value="" />
                                                <label for="filtr2">
                                                    <span></span><a href="">25</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr3" name="check" value="" />
                                                <label for="filtr3">
                                                    <span></span><a href="">26</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr4" name="check" value="" />
                                                <label for="filtr4">
                                                    <span></span><a href="">27</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr5" name="check" value="" />
                                                <label for="filtr5">
                                                    <span></span><a href="">35</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr6" name="check" value="" />
                                                <label for="filtr6">
                                                    <span></span><a href="">36</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr7" name="check" value="" />
                                                <label for="filtr7">
                                                    <span></span><a href="">40</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr8" name="check" value="" />
                                                <label for="filtr8">
                                                    <span></span><a href="">41</a>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="filters-save">
                                <a class="btn">
                                    Зберегти
                                </a>
                            </div>

                            <div class="dropdown-div">
                                <div class="dropdown-div-btn">
                                    Виробник
                                    <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                </div>
                                <div class="dropdown-div-content">
                                    <ul>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr10" name="check" value="" />
                                                <label for="filtr10">
                                                    <span></span><a href="">Україна</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr21" name="check" value="" />
                                                <label for="filtr21">
                                                    <span></span><a href="">Турція</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr31" name="check" value="" />
                                                <label for="filtr31">
                                                    <span></span><a href="">Китай</a>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="add-prod-check">
                                                <input type="checkbox" id="filtr41" name="check" value="" />
                                                <label for="filtr41">
                                                    <span></span><a href="">Англія</a>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="grid-header">

                    </div>
                    <div class="grid-item">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <div class="label new">New</div>
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            {{--<a class="add-to-wishlist" href="">--}}
                                                {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}
                                            <a class="add-to-wishlist active" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            <div class="size-addToCart">
                                                <div class="size">
                                                    <span>40</span>
                                                    <span>35</span>
                                                    <span class="active">36</span>
                                                    <span>37</span>
                                                    <span>38</span>
                                                    <span>39</span>
                                                </div>
                                                <a href="" class="btn active">В кошику</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="prod-title">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod-price">
                                        <span class="old-price"> 2000 грн </span>
                                        <span> 1800 грн </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <div class="label top">Top</div>
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

                                            <div class="size-addToCart">
                                                <div class="size">
                                                    <span>40</span>
                                                    <span>35</span>
                                                    <span class="active">36</span>
                                                    <span>37</span>
                                                    <span>38</span>
                                                    <span>39</span>
                                                </div>
                                                <a href="" class="btn">В кошик</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="prod-title">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod-price">
                                        <span class="old-price"> 2000 грн </span>
                                        <span> 1800 грн </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <div class="label sale">Sale</div>
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

                                            <div class="size-addToCart">
                                                <div class="size">
                                                    <span>40</span>
                                                    <span>35</span>
                                                    <span class="active">36</span>
                                                    <span>37</span>
                                                    <span>38</span>
                                                    <span>39</span>
                                                </div>
                                                <a href="" class="btn">В кошик</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="prod-title">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod-price">
                                        <span class="old-price"> 2000 грн </span>
                                        <span> 1800 грн </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

                                            <div class="size-addToCart">
                                                <div class="size">
                                                    <span>40</span>
                                                    <span>35</span>
                                                    <span class="active">36</span>
                                                    <span>37</span>
                                                    <span>38</span>
                                                    <span>39</span>
                                                </div>
                                                <a href="" class="btn">В кошик</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="prod-title">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod-price">
                                        <span class="old-price"> 2000 грн </span>
                                        <span> 1800 грн </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

                                            <div class="size-addToCart">
                                                <div class="size">
                                                    <span>40</span>
                                                    <span>35</span>
                                                    <span class="active">36</span>
                                                    <span>37</span>
                                                    <span>38</span>
                                                    <span>39</span>
                                                </div>
                                                <a href="" class="btn">В кошик</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="prod-title">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod-price">
                                        <span class="old-price"> 2000 грн </span>
                                        <span> 1800 грн </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="prod-item">
                                    <div class="prod-img">
                                        <img src="/image/products/item-06.jpg" alt="">
                                        <div class="item-overlay">
                                            <a class="add-to-wishlist" href="">
                                                <i class="fas fa-heart"></i>
                                            </a>

                                            {{--
                                                CHECK add class ACTIVE
                                            <a class="add-to-wishlist active" href="">--}}
                                            {{--<i class="fas fa-heart"></i>--}}
                                            {{--</a>--}}

                                            <div class="size-addToCart">
                                                <div class="size">
                                                    <span>40</span>
                                                    <span>35</span>
                                                    <span class="active">36</span>
                                                    <span>37</span>
                                                    <span>38</span>
                                                    <span>39</span>
                                                </div>
                                                <a href="" class="btn">В кошик</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="prod-title">
                                        <a href="">Reabook Classic</a>
                                    </div>
                                    <div class="prod-price">
                                        <span class="old-price"> 2000 грн </span>
                                        <span> 1800 грн </span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    @include('partial.pagination')

                </div>
            </div>
        </div>
    </div>

@endsection