<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom custom-font-titillium-web">Contact with us</h2>
    <div class="row">
    <div class="card-group">
  <div class="card">
  <img style="width: 35%;margin: 0 auto;" src="{{asset('frontend/images/icons/mail.png')}}"> 
    <div class="card-body">
      <p class="card-title custom-font-titillium-web">Email : {{ @$contact_infos['email'] }}</p>
    </div>
    <div class="card-footer">
    </div>
  </div>
  <div class="card">
  <img style="width: 35%;margin: 0 auto;" src="{{asset('frontend/images/icons/call_icon.png')}}"> 
    <div class="card-body">
      <p class="card-title custom-font-titillium-web"> Phone : {{@$contact_infos->phone}}</p>
      <p class="card-title custom-font-titillium-web"> Fax : {{@$contact_infos->fax}}</p>
    </div>
    <div class="card-footer">
     
    </div>
  </div>
  <div class="card">
  <img style="width: 35%;margin: 0 auto;" alt="location_icon" src="{{asset('frontend/images/icons/location.png')}}"> 
    <div class="card-body">
      <p class="card-text custom-font-titillium-web">{{  @$contact_infos->location  }}</p>
    </div>
    <div class="card-footer">
      
    </div>
  </div>
</div>