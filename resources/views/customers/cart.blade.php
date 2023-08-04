@extends('layouts.customers')
@section('content')
    <section class="main">
        <div class="content">
            <section class="bar">
                <div class="bar-frame">
                    <ul class="breadcrumbs">
                        <li><a href="index.html">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </section>
            <table class="list_table">
                <tr>
                    <td class="braun first">
                        <span>Item</span>
                    </td>
                    <td class="braun price">
                        <span>Price</span>
                    </td>
                    <td class="braun qua"><span>Quantity</span></td>
                    <td class="braun total"><span>Total</span></td>
                    <td class="braun last"></td>
                </tr>
                <tr>
                    <td class="white first">
                        <img src="{{ asset('templates/Bambino/images/pic_13.png') }}" height="131" width="90" alt="" />
                        <div class="description">
                            <h3><a href="#"> Lorem ipsum dolor sit</a></h3>
                            <p>Dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos
                                dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt
                                in culpa qui officia deserunt mollitia animi.</p>
                        </div>
                    </td>
                    <td class="white two">$80.50</td>
                    <td class="white three">
                        <div class="row">
                            <select id="size">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </td>
                    <td class="white four">$80.50</td>
                    <td class="white last">
                        <div class="row"><a class="btn-delete" href="#">delete</a></div>
                    </td>
                </tr>
                <tr>
                    <td class="white first">
                        <img src="{{ asset('templates/Bambino/images/pic_14.png') }}" height="131" width="90" alt="" />
                        <div class="description">
                            <div class="description">
                                <h3><a href="#">Ducimus qui blanditiis praesentium</a></h3>
                                <p>Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                                    fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum
                                    soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime.</p>
                            </div>
                        </div>
                    </td>
                    <td class="white two">$125.00</td>
                    <td class="white three">
                        <div class="row">
                            <select id="quantity">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </td>
                    <td class="white four">$125.00</td>
                    <td class="white last">
                        <div class="row"><a class="btn-delete" href="#">delete</a></div>
                    </td>
                </tr>
                <tr>
                    <td class="white first">
                        <img src="{{ asset('templates/Bambino/images/pic_15.png') }}" height="131" width="90" alt="" />
                        <div class="description">
                            <div class="description">
                                <h3><a href="#">Temporibus autem quibusdam</a></h3>
                                <p>Omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                                    aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
                            </div>
                        </div>
                    </td>
                    <td class="white two">$125.00</td>
                    <td class="white three">
                        <div class="row">
                            <select id="quantity-2">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </td>
                    <td class="white four">$125.00</td>
                    <td class="white last">
                        <div class="row"><a class="btn-delete" href="#">delete</a></div>
                    </td>
                </tr>
            </table>
            <ul class="list-table" style="display: none;">
                <li>
                    <div class="rows rows-item">
                        <img src="{{ asset('templates/Bambino/images/pic_13.png') }}" height="131" width="90" alt="" />
                        <h3><a href="#">Lorem ipsum dolor sit</a></h3>
                    </div>
                    <div class="rows-holder">
                        <div class="rows rows-select">
                            <div class="row">
                                <select id="quantity">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="rows rows-price">
                            <span>$80.50</span>
                        </div>
                        <div class="rows rows-delete">
                            <a class="btn-delete" href="#">delete</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="rows rows-item">
                        <img src="{{ asset('templates/Bambino/images/pic_14.png') }}" height="131" width="90" alt="" />
                        <h3><a href="#">Ducimus qui blanditiis praesentium</a></h3>
                    </div>
                    <div class="rows-holder">
                        <div class="rows rows-select">
                            <div class="row">
                                <select id="quantity-2">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="rows rows-price">
                            <span>$125.00</span>
                        </div>
                        <div class="rows rows-delete">
                            <a class="btn-delete" href="#">delete</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="rows rows-item">
                        <img src="{{ asset('templates/Bambino/images/pic_15.png') }}" height="131" width="90" alt="" />
                        <h3><a href="#">Temporibus autem quibusdam</a></h3>
                    </div>
                    <div class="rows-holder">
                        <div class="rows rows-select">
                            <div class="row">
                                <select id="quantity-2">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="rows rows-price">
                            <span>$125.00</span>
                        </div>
                        <div class="rows rows-delete">
                            <a class="btn-delete" href="#">delete</a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="box_sub_total">
                {{-- all css untuk ngatur layoutsing. atau bisa langsung global search cari classnya di css. --}}
                <h4>Subtotal: $380.50</h4>
                <p>+ shippment: $9.99</p>
                <h2>Total to pay: $80.99</h2>
                <a class="btn btn_finalize" href="#">Finalize and pay</a>
            </div>
        </div>
    </section>
@endsection
