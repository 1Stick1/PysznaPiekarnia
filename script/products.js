
let list_cake = document.getElementById('list-cake');
let list_muffins = document.getElementById('list-muffins');
let list_croissant = document.getElementById('list-croissant');
let list_bread = document.getElementById('list-bread');

let cake = document.getElementById('cake');
let muffins = document.getElementById('muffins');
let croissant = document.getElementById('croissant');
let bread = document.getElementById('bread');




function active_list(active_list, not_active1_list, not_active2_list, not_active3_list, active_product, not_active2_product, not_active3_product, not_active4_product){
    active_list.classList.add('active');
    not_active1_list.classList.remove('active');
    not_active2_list.classList.remove('active');
    not_active3_list.classList.remove('active');

    active_product.classList.add('product-active');
    not_active4_product.classList.remove('product-active');
    not_active3_product.classList.remove('product-active');
    not_active2_product.classList.remove('product-active');

}

list_cake.addEventListener('click', function(){
    active_list(list_cake, list_muffins, list_croissant, list_bread, cake, muffins, croissant, bread);
});
list_muffins.addEventListener('click', function(){
    active_list(list_muffins, list_cake, list_croissant, list_bread, muffins, cake, croissant, bread);
});
list_croissant.addEventListener('click', function(){
    active_list(list_croissant, list_muffins, list_cake, list_bread, croissant, muffins, cake, bread);
});
list_bread.addEventListener('click', function(){
    active_list(list_bread, list_muffins, list_croissant, list_cake, bread, muffins, croissant, cake);
});

