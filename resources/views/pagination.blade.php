<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <title>Custom Pagination</title>
</head>
<body>
    <section class="multi_collection">
        <div class="container">
            <div class="row">
                <div class="colum-25">
                    <div class="row">
                        <div class="colum-100">
                
                        </div>
                    </div>
                </div>
                <div class="colum-100 total_width">
                    <div class="row">
                        <div class="collection_image">
                            @foreach ($products as $item)
                                <div class="colum-25 parent total_width">
                                    <p onclick="" class="bookmark"><i class="far fa-bookmark"></i></p>
                                    <a href="">
                                        <img src="{{asset('assets/img/'.$item->image)}}">
                                        
                                        <p class="title">{{$item->name}}</p>
                                        <p class="description">{{$item->title}}</p>
                                        <p class="price">
                                            <span class="new">${{ceil($item->unit_price)}}.00</span>
                                            <span class="old">${{ceil($item->unit_price)}}.00</span>
                                        </p>
                                        <p class="promo">Promo Code Eligible</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="colum-100">
                            @if ($products->lastPage()>1)
                                <nav>
                                    <ul class="pagination">
                                        @php
                                            $count_page=0;
                                            $current_page=$products->currentPage();
                                        @endphp
                                        <li class="page-item {{ ($products->onFirstPage()) ? ' disabled' : '' }}" aria-disabled="true" aria-label="« Previous">
                                            @if ($products->currentPage() == 1)
                                                <span class="page-link" aria-hidden="true">‹</span>
                                            @else
                                                <a class="page-link" href="{{$products->previousPageUrl()}}" rel="next" aria-label="Next »">‹</a>
                                            @endif
                                        </li>
                                        @if ($products->lastPage()-$products->currentPage()<=1)
                                            @php
                                                $current_page=$current_page-1;
                                            @endphp
                                            <li class="page-item">
                                                <a class="page-link" href="{{$products->url(1)}}">1</a>
                                            <li>
                                            <li class="page-item">
                                                <span class="page-link">...</span>
                                            <li>
                                        @endif
                                        @foreach(range($current_page,$products->lastPage() ) as $i)
                                            @if ($count_page<2)
                                                @if ($i==$products->currentPage())
                                                    <li class="page-item active">
                                                        <span class="page-link">{{ $i }}</span>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{$products->url($i)}}">{{ $i }}</a>
                                                @endif
                                                    </li>
                                            @else
                                                <li class="page-item">
                                                    <span class="page-link">...</span>
                                                <li>
                                                <li class="page-item">
                                                    <a class="page-link" href="{{$products->url($products->lastPage())}}">{{ $products->lastPage() }}</a>
                                                <li>
                                                @php
                                                    break;
                                                @endphp  
                                            @endif
                                            @php
                                                $count_page++;
                                            @endphp
                                        @endforeach
                                        <li class="page-item">
                                            @if ($products->hasMorePages())
                                                <a class="page-link" href="{{$products->nextPageUrl()}}" rel="next" aria-label="Next »">›</a>
                                            @else
                                                <span class="page-link" aria-hidden="true">›</span>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
