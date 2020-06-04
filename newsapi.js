let NewsApi = {
    itemsperpage : 10,
    currentpage : 1,
    pagerStarted:false,
    CardMold : {},
    init: function(){

        CardMold = $("#baseCard").clone();
        CardMold.removeAttr("id");
        NewsApi.CardMold = CardMold;
        $("#baseCard").remove();
        this.loadNews();

    },
    loadNews: function(){
        let url = "http://newsapi.org/v2/top-headlines";
        let data = {
            country:"mx",
            category:"business",
            apiKey:"e4c198c261b446a894c319c3048e1ebc",
            pageSize:this.itemsperpage,
            page: this.currentpage
        };
        //let url = "response.json";
        //let data = {};
        $.get(url,data,function(response){
            if(response.status == 'ok'){
                if(NewsApi.pagerStarted == false){
                    NewsApi.genPager(response.totalResults);
                }
                $("#newsCount").text(response.totalResults);
                $(".container .row").empty();
                response.articles.forEach(function(item){
                    var card = NewsApi.CardMold.clone();
                    NewsApi.loadUser(card);
                    card.find(".card-img-top").attr("src",item.urlToImage);
                    card.find(".card-title").text(item.title);
                    card.find(".card-text").text(item.content);
                    card.find(".url").attr("href",item.url);
                    card.appendTo(".container .row");
                })
            }
        },'json');
    },
    genPager:function(totalItems){
        let self = this;
        let pager = $("#basePager");
        let pager_item = pager.find(".page-item").remove();
        let totalPages = Math.round(parseInt(totalItems) / parseInt(this.itemsperpage));
        for(i=1;i<=totalPages;i++){
            var item = pager_item.clone();
            item.find(".page-link").text(i);
            item.find(".page-link").attr("data-page",i);
            if(self.currentpage == i){
                item.addClass("active");
            }else{
                item.removeClass("active");
            }
            item.appendTo(pager);
        }
        NewsApi.pagerStarted = true;
    },
    loadUser :function(card){
        $.get("https://randomuser.me/api/?noinfo&inc=name,picture",{},function(response){
            $(card).find(".img-thumbnail").attr("src",response.results[0].picture.thumbnail);
            $(card).find(".auth-name b").text(response.results[0].name.first + " " + response.results[0].name.last);
        },'json');
    },
    JumpToPage:function(elem){
        let self = elem;
        let page = elem.dataset.page;

        $("#basePager li").map(function(i,li){
            $(li).removeClass("active");
        })
        $(self).closest("li").addClass("active");
        NewsApi.currentpage = page;
        NewsApi.loadNews();
    }
}

$(document).ready(function(){
    NewsApi.init();
});