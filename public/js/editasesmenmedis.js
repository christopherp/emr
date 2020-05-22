$(document).ready(function(){
    displayCheckboxValue(nyeri_haid_saats, "nyeri_haid_saat");    
    displayCheckboxValue(penyakit_jantungs, "penyakit_jantung");    
    displayCheckboxValue(penyakit_parus, "penyakit_paru");
    displayCheckboxValue(penyakit_infeksis, "penyakit_infeksi");
    displayCheckboxValue(penyakit_metaboliks, "penyakit_metabolik");
    displayCheckboxValue(penyakit_operasis, "penyakit_operasi");
    displayCheckboxValue(keadaans, "keadaan");
});

function displayCheckboxValue(array, inputclass) {
    console.log(array,inputclass);
    $.each(array, function(index, item){
        $('.'+inputclass).each(function(){
            if($(this).attr('type')==="checkbox"){
                if(this.value == item) {                        
                    this.checked = true;                       
                }
            } 
            else{
                this.value=item;
            }           
        });
    });
}