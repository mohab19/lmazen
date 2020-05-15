@extends('layouts.header')
@section('headerscripts')
    <script type="text/javascript">
        googletag.cmd.push(function() {
            googletag.defineSlot("5676292/Di_Bloc_Homepage_0", [1920, 330], "Di_Bloc_Homepage_0").addService(googletag.pubads());
            googletag.defineSlot("5676292/Di_Bloc_Homepage_1", [1920, 330], "Di_Bloc_Homepage_1").addService(googletag.pubads());
            googletag.defineSlot("5676292/Di_Bloc_Homepage_2", [1920, 330], "Di_Bloc_Homepage_2").addService(googletag.pubads());
            googletag.defineSlot("5676292/Di_Bloc_Homepage_3", [1920, 330], "Di_Bloc_Homepage_3").addService(googletag.pubads());
            googletag.defineSlot("5676292/Di_Bloc_Homepage_4", [1920, 330], "Di_Bloc_Homepage_4").addService(googletag.pubads());

            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
        });
    </script>
    <script type="text/javascript">
        var HeadGlobalJsVar_ajaxCountryListUrl = "https://www.directindustry.com/ajax/country/list.json";
        var HeadGlobalJsVar_urlKey = "accueil";
        var HeadGlobalJsVar_myDomain = "directindustry.com";
        ve.context = ve.context || {};
    </script>
@endsection
@section('content')
<div id="main" class="container-fluid" style="padding: 0 30px;">
    <div class="univers-main">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 searchBarContainer">
                <div class="bigBaseline">Every great purchase starts here!</div>
                <div class="productsCount">Search amongst {{$productsCount}} products</div>
                <div id="search-products" class="header-search">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <input type="hidden" name="searchType" value="products">
                        <div class="input-group row">
                            <input class="input col-10" type="text" name="searchTerms" value="" placeholder="Brand, model, keywords..." autocomplete="disable" />
                            <div class="header-search-buttons input-group-item col-2">
                                <div id="header-search-delete"></div>
                                <button id="header-search-launch-button" class="btn" type="submit" style="width: 100%;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($sectors as $key => $sector)
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <ul class="univers-group">
                    <li class="univers-group-item" on-click="slide('.category-group')">
                            <span title="Detection - Measurement">{{$sector->name}}</span>
                        <i class="fa fa-angle-down right"></i>
                        <ul class="category-group">
                            @foreach($sector->Categories as $category)
                            <li class="category-group-item">
                                <a href='{{URL("categories") . "/" . $category->id}}' onclick="var event = arguments[0] || window.event; event.stopPropagation();" >{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>

    <div id="new-products" class="home-gallery" data-placement="1">
        <div decorator="cloakRender">
            <div class="veSpinner fa fa-spinner fa-pulse"></div>
            <div class="data-cloak">
                <div class="main-title"><span>NEW - PRODUCTS</span></div>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-2 col-md-fifth col-sm-4 col-xs-6">
                        <div class="inset inline-center">
                            <div class="inset-img innovationClass inline-center">
                                <a href="{{URL('product')  . '/' . $product->id}}" title="{{$product->name}}">
                                    <img src="{{asset('images/uploaded') . '/' . $product->image}}" alt=""/>
                                </a>
                            </div>

                            <div class="inset-caption price-container">
                                <a href="{{URL('product') . '/' . $product->id}}" title="{{$product->name}}">
                                    <span class="short-name">{{$product->name}}</span>
                                    <span class="brand">{{$product->Company->name}}</span>
                                </a>

                                <a href="{{URL('companies') . '/' . $product->Company->id}}" class="logo">
                                    <img src="{{asset('images/uploaded') . '/' . $product->Company->image}}" title="{{$product->Company->name}}" />
                                </a>
                            </div>

                            <div class="ads-icon"><i class="fa fa-bookmark"></i>highlightLabel</div>
                            <div class="new-video">
                                <div class="icon-big new"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="new-projects" data-placement="6">
        <div decorator="cloakRender">
            <div class="veSpinner fa fa-spinner fa-pulse"></div>
            <div class="data-cloak">
                <div class="main-title"><span> Trending Projects </span></div>
                <div class="row">
                    @foreach($projects as $key => $project)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                        <div class="inset">
                            <div class="inset-img inline-center" data-id="{{$project->id}}" data-companyid="{{$project->Company->id}}" on-click="openDetail('project')">
                                <a href="{{URL('projects') . '/' . $project->id}}" title="{{$project->title}}">
                                    <img src="{{URL('images/uploaded/projects') . '/' . $project->image}}" alt="{{$project->name}}"/>
                                </a>
                            </div>

                            <div class="row inset-caption collapse">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-12 col-md-12 col-sm-12 col-xs-12" data-id="{{$project->id}}" data-companyid="{{$project->Company->id}}" on-click="openDetail('project')">
                                    <a href="{{URL('projects') . '/' . $project->id}}" title="{{$project->name}}">
                                        <span class="short-name">{{$project->name}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="ads-icon"><i class="fa fa-bookmark"></i>  highlightLabel </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="new-trends" data-placement="8">
        <div decorator="cloakRender">
            <div class="veSpinner fa fa-spinner fa-pulse"></div>
            <div class="data-cloak">
                <div class="main-title"><span> News & Trends </span></div>
                <div class="row">
                    @foreach($news as $key => $news)
                    <div class="col-lg-fifth col-md-3 col-sm-4 col-xs-4">
                        <div class="inset">
                            <div class="inset-img inline-center" data-id=" id " data-companyid="{{$news->Company->id}} " on-click="openDetail('trends')">
                                <a href="{{URL('news') . '/' . $news->id}}" title="{{$news->title}}">
                                    <img src="{{URL('images/uploaded/news') . '/' . $news->image}}" alt="{{$news->title}}"/>
                                </a>
                            </div>

                            <div class="row inset-caption collapse">
                                <div class="col-lg-8 col-md-8" data-id="{{$news->id}}" data-companyid="{{$news->Company->id}}" on-click="openDetail('trends')">
                                    <a href="{{URL('news') . '/' . $news->id}}" encrypt="false" title="{{$news->title}}">
                                        <span class="short-name">{{$news->title}}</span>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img src="{{URL('images/uploaded') . '/' . $news->Company->image}}" class="logo right" title="{{$news->Company->name}}" />
                                    </a>
                                </div>
                            </div>
                            <div class="ads-icon"><i class="fa fa-bookmark"></i> highlightLabel </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="emag-items" class="home-gallery" data-placement="0">
        <div decorator="cloakRender">
            <div class="veSpinner fa fa-spinner fa-pulse"></div>
            <div class="data-cloak">
                <div class="main-title"><span> Latest Articles </span></div>
                <div class="row">
                    @foreach($articles as $key => $article)
                    <div class="col-lg-6 col-md-6">
                        <div class="inset">
                            <div class="inset-img inline-center" data-id=" id " on-click="openDetail('emag','false')">
                                <a href="{{URL('articles') . '/' . $article->id}}" class="external" title="{{$article->title}}">
                                    <img src="{{asset('images/uploaded/articles') . '/' . $article->image}}" alt="{{$article->title}}" width="100%" height="100%" class="crop-width crop-height"/>
                                </a>
                            </div>
                            <div class="row inset-caption">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-id=" id " on-click="openDetail('emag','false')">
                                    <a href="{{URL('articles') . '/' . $article->id}}" class="external" title="{{$article->title}}">
                                        <span class="short-name">{{$article->title}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
