
function getPageList(totalPages, page, maxLength){
    function range(start,end){
        return Array.from(Array(end - start + 1), (_, i) => i + start);
    }

    var sideWidth = maxLength < 9 ? 1 : 2;
    var leftWidth = (maxLength - sideWidth*2 -3) >> 1;
    var rightWidth = (maxLength - sideWidth*2 -3) >> 1;

    if(totalPages <= maxLength){
        return range(1, totalPages);
    }

    if(page <= maxLength - sideWidth - 1 - rightWidth){
        return range(1, maxLength - sideWidth -1).concat(0, range(totalPages - sideWidth +1, totalPages));
    }

    if(page >= totalPages - sideWidth - 1 - rightWidth){
        return range(1,sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
    }

    return range(1, sideWidth).concat(0,range(page - leftWidth, page + rightWidth), 0 ,range(totalPages - sideWidth + 1, totalPages));
}

$(function(){
    var numberOfItems = $(".all-game-content .box").length;
    var limitPerPage = 12; //hien bao nhieu game tren trang
    var totalPages = Math.ceil(numberOfItems / limitPerPage);
    var paginationSize = 5 //bao nhieu so trang muon hien
    var currentPage;
    const galleryItems = document.querySelector(".all-game-content").children;

    function showPage(whichPage){
        if(whichPage < 1 || whichPage > totalPages)
            return false;
        
        currentPage = whichPage;


        // for(let i = 0; i<numberOfItems; i++)
        // {
        //     galleryItems[i].classList.remove("show");
        //     galleryItems[i].classList.add("hide");

        //     if(i>=(currentPage*limitPerPage)-limitPerPage && i<currentPage*limitPerPage)
        //     {
        //         galleryItems[i].classList.remove("hide");
        //         galleryItems[i].classList.add("show");
                
        //     }
        // }
    
       $(".all-game-content .box").hide().slice((currentPage - 1)* limitPerPage, currentPage*limitPerPage).show();

        $(".pagination li").slice(1, -1).remove();
        
        
        getPageList(totalPages, currentPage, paginationSize).forEach(item => {
            $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
                .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                .attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page");
        });



        $(".previous-page").toggleClass("disable",currentPage === 1);
        $(".next-page").toggleClass("disable",currentPage === totalPages);
        return true;
    }


    $(".pagination").append(
        $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link")
            .attr({href: "javascript:void(0)"}).text("Prev")),
        $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link")
            .attr({href: "javascript:void(0)"}).text("Next")),
    );

    $(".all-game-content").show();
    showPage(1);

    $(document).on("click",".pagination li.current-page:not(.active)", function(){
        return showPage(+$(this).text());
    });

    $(".next-page").on("click", function(){
        return showPage(currentPage + 1);
    });

    $(".previous-page").on("click", function(){
        return showPage(currentPage - 1);
    });
});

//-------------------------------------------------------------------------------------
    //  const galleryItems = document.querySelector(".all-game-content").children;
    //  const prev = document.querySelector(".previous-page");
    //  const next = document.querySelector(".next-page");
    //  const page = document.querySelector(".page-num");
    //  const maxItem = 12;
    //  let index=1;
    //  const pagination = Math.ceil(galleryItems.length/maxItem);

    //  prev.addEventListener("click",function(){
    //      index--;
    //      check();
    //      showItems();
    //  })

    //  next.addEventListener("click",function(){
    //     index++;
    //     check();
    //     showItems();
    // })
    // function check(){
    //     if(index==pagination){
    //         next.classList.add("disable");
    //     }
    //     else{
    //         next.classList.remove("disable");
    //     }

    //     if(index==1){
    //         prev.classList.add("disable");
    //     }
    //     else {
    //         prev.classList.remove("disable");
    //     }
    // }

    //  function showItems(){
    //        for(let i = 0; i<galleryItems.length;i++)
    //        {
    //            galleryItems[i].classList.remove("show");
    //            galleryItems[i].classList.add("hide");
       
    //            if(i>=(index*maxItem)-maxItem && i<index*maxItem)
    //            {
    //                galleryItems[i].classList.remove("hide");
    //                galleryItems[i].classList.add("show");
                   
    //            }
               
    //           page.innerHTML=index;
    //        }
    //    }

    //    window.onload=function(){
    //        showItems();
    //        check();
    //    }