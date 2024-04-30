
let filterComapny=document.getElementById('filer_company_id')
if(filterComapny){
filterComapny.addEventListener('change' ,function (params) {
  let companyId= this.value || this.options[this.selectedIndex].value
  window.location.href=window.location.href.split('?')[0]+ '?company_id='+ companyId
})

}


//to delete data
document.querySelectorAll('.btn-delete').forEach((button)=>
{
  button.addEventListener('click',function(event){
    event.preventDefault()
   if(confirm('Are you sure?')){
   let action=this.getAttribute('href')
   let form=document.getElementById('form-delete')
   form.setAttribute('action',action)
   form.submit()
   }
  })
})
//clear the companies and search box function
let btnClear= document.getElementById('btn-clear')

if(btnClear)
{
  btnClear.addEventListener('click',()=>
  {

    let input=document.getElementById('search'),

    select=document.getElementById("filer_company_id")
  


    if (input) {
      input.value=""
    } 
    if(select)   select.selectedIndex=0
   
  
    window.location.href=window.location.href.split('?')[0]
  })
}




// to hide and show referesh btn

const toggleClearButton=()=>
{
  let query=location.search,
  pattern=/[?&]search=/,
  button=document.getElementById('btn-clear')

  if(pattern.test(query))
  {
    button.style.display="block"
  }else
  {
    button.style.display="none"
  }
}

toggleClearButton()