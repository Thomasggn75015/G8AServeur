function searchResults(){
    $searchText = document.getElementById("searchText");
    document.getElementById("searchText").value = "lol";
    if($searchText.length == 0){
        document.getElementById("results-search").innerHTML = "";
        document.getElementById("results-search").style.border = "0px";
        return;
    }

xmlSearch = new XMLHttpRequest();
xmlSearch.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        document.getElementById("results-search") = this.responseText;
        document.getElementById("results-search").style.border = "1px solid #afcae8";
    }
}

xmlSearch.open("GET", "app/Controllers/SearchEngine.php?searchParam=" + $searchText, true);
xmlSearch.send();
}