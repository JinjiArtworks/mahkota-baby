@extends('layouts.customers')
@section('content')
    <section class="main">
        <div class="content">
            <section class="bar">
                <div class="bar-frame">
                    <ul class="breadcrumbs">
                        <li><a href="index.html">Home</a></li>
                        <li>Product page</li>
                    </ul>
                </div>
            </section>
            <div class="details-info">
                <div class="slid_box">
                    <ul class="bxslider">
                        <li><img src="{{ asset('templates/Bambino/images/pic_slid_01_0.png') }}" /></li>
                        <li><img src="{{ asset('templates/Bambino/images/pic_slid_01_0.png') }}" /></li>
                        <li><img src="{{ asset('templates/Bambino/images/pic_slid_01_0.png') }}" /></li>
                        <li><img src="{{ asset('templates/Bambino/images/pic_slid_01_0.png') }}" /></li>
                    </ul>
                    <div id="bx-pager">
                        <a class="first" data-slide-index="0" href="#"><img src="{{ asset('templates/Bambino/images/pic_slid_01_0.png') }}" /></a>
                        <a data-slide-index="1" href=""><img src="{{ asset('templates/Bambino/images/pic_slid_03.png') }}" /></a>
                        <a data-slide-index="2" href=""><img src="{{ asset('templates/Bambino/images/pic_slid_04.png') }}" /></a>
                        <a data-slide-index="3" href=""><img src="{{ asset('templates/Bambino/images/pic_slid_05.png') }}" /></a>
                    </div>
                </div>
                <div class="description">
                    <div class="head">
                        <h1 class="title">Praesentium voluptatum deleniti lorem dolor atque</h1>
                        <h3>Manufacturer name</h3>
                        <h2>$65.00</h2>
                    </div>
                    <div class="section">
                        <form class="form-sort page" action="cart.html">
                            <fieldset>
                                <div class="row">
                                    <label for="page">Quantity:</label>
                                    <select id="page">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                    <div class="clear"></div>
                                </div>
                                <input type="submit" value="Add to cart" class="btn pink" />
                            </fieldset>
                        </form>
                    </div>
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Product information</a></li>
                            <li><a href="#tabs-2">How to use</a></li>
                            <li><a href="#tabs-3">Reviews</a></li>
                        </ul>
                        <div id="tabs-1">Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                            praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                            occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi,
                            id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam
                            libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                            maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                            Temporibus autem quibusdam et aut officiis debitis.</div>
                        <div id="tabs-2">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel,
                            aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum
                            bibendum.</div>
                        <div id="tabs-3">
                            <ul class="reviews">
                                <li>
                                    <p class="name">John Smith, 25.05.2014</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip.</p>
                                </li>
                                <li class="light">
                                    <p class="name">Glen Johnson, 24.05.2014</p>
                                    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                </li>
                                <li>
                                    <p class="name">Susan Blumkin, 21.05.2014</p>
                                    <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation.</p>
                                </li>
                                <li class="light">
                                    <p class="name">Chris Harris, 24.05.2014</p>
                                    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
@endsection
