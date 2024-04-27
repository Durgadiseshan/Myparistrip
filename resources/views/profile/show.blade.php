@extends('layouts.theme.sub')
@section('innerContent')
<!-- inner style link start -->
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<link href="{{ asset('css/tour.css') }}" rel="stylesheet">
<!-- inner style link end -->
<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Profile') }}
		</h2>
	</x-slot>
	<div>
		<!-- old code start -->

			<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
			@if (Laravel\Fortify\Features::canUpdateProfileInformation())
			@livewire('profile.update-profile-information-form')
			<x-section-border />
			@endif
			@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
			<div class="mt-10 sm:mt-0">
				@livewire('profile.update-password-form')
			</div>
			<x-section-border />
			@endif
			{{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
			<div class="mt-10 sm:mt-0">
				@livewire('profile.two-factor-authentication-form')
			</div>
			<x-section-border />
			@endif --}}
			{{-- <div class="mt-10 sm:mt-0">
				@livewire('profile.logout-other-browser-sessions-form')
			</div> --}}
			@if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
			<x-section-border />
			<div class="mt-10 sm:mt-0">
				@livewire('profile.delete-user-form')
			</div>
			@endif
		</div>
		<!-- old code end -->
		<div class="container common-container py-5">
			<div class="row profile-page">
				<div class="col-xl-3 col-lg-4 col-md-12 col-12 mb-4">
					<div class="bg-white p-4 p-md-5" style="border-radius: 20px;">
						<div class="m-auto"> 
							<div class="relative profile-img m-auto" style="width: 170px;">
								<img src="{{ asset('images/profile.svg') }}" class="w-100">
								<img src="{{ asset('images/white_edit-solid.svg') }}" class="absolute" style="right: 3px;bottom: 4px;">
							</div>
							<div>
								<ul class="nav nav-pills" role="tablist" style="display: block;">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="pill" href="#home">Account Settings</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="pill" href="#menu1">My Trips</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="pill" href="#menu2">Change Password</a>
									</li>
									<li class="nav-item">
										<a class="nav-link">Log Out</a>

										<form method="POST" action="{{ route('logout') }}" class="inline">
											@csrf
						
											<button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
												{{ __('Log Out') }}
											</button>
										</form>	



									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-9 col-lg-8 col-md-12 col-12">
					<div class="bg-white p-4 p-md-5" style="border-radius: 20px;">
						<div class="tab-content">
							<div id="home" class="tab-pane active mb-4">
								<div class="profile-outer">
									<div class="row p-3">
										<div class="col-12 col-md-8">
											<p class="title-account">Account Settings</p>
										</div>
										<div class="col-12 col-md-4">
											<div>
												<img src="{{ asset('images/edit-solid.svg') }}" class="ml-auto">
											</div>
										</div>
									</div>
									<hr>
									<div class="row p-3">
										<div class="col-12 col-md-8 field-seaction mb-4">
											<div class="mb-3">
												<x-label for="first" value="{{ __('First Name') }}" />
												<x-input id="first" class="block mt-1 w-full shadow-none" placeholder="First Name" type="text" name="first" />
											</div>
											<div class="mb-3">
												<x-label for="last" value="{{ __('Last Name') }}" />
												<x-input id="last" class="block mt-1 w-full shadow-none" placeholder="Last Name" type="text" name="last" />
											</div>
											<div class="mb-3">
												<x-label for="email" value="{{ __('Email') }}" />
												<x-input id="email" class="block mt-1 w-full shadow-none" placeholder="Email" type="text" name="email" />
											</div>
											<div class="mb-3">
												<x-label for="phone" value="{{ __('Phone Number') }}" />
												<x-input id="phone" class="block mt-1 w-full shadow-none" placeholder="Phone" type="text" name="phone" />
											</div>
											<x-button class="border-0 px-4 py-2 rounded-pill text-white f-16 fw-600 bg-blue text-capitalize" style="height: 43px;letter-spacing: normal;">
												{{ __('Save Changes') }}
											</x-button>
										</div>
										<div class="col-12 col-md-4">
											<div class="align-items-center d-flex flex-column h-100 justify-center text-center">
												<div class="mx-auto w-50">
													<img src="{{ asset('images/people.svg') }}" class="m-auto w-full">
												</div>
												<x-button class="border-0 mt-3 px-4 py-2 rounded-pill text-blue f-16 fw-600 border-blue bg-transparent text-capitalize" style="height: 43px;letter-spacing: normal;">
													{{ __('Chose Image') }}
												</x-button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="menu1" class="tab-pane fade mb-4">
								<div class="profile-outer">
									<div class="row p-3">
										<div class="col-12 col-md-8">
											<p class="title-account">Change Password</p>
										</div>
										<!-- <div class="col-12 col-md-4">
											<div>
												<img src="{{ asset('images/edit-solid.svg') }}" class="ml-auto">
											</div>
											</div> -->
									</div>
									<hr>
									<div class="row p-3">
										<div class="col-12 col-md-12 field-seaction">
											<div class="mb-3">
												<x-label for="Current" value="{{ __('Current Password') }}" />
												<x-input id="Current" class="block mt-1 w-full shadow-none" placeholder="Current Password" type="text" name="Current" />
											</div>
											<div class="row row-new">
												<div class="col-12 col-md-6 mb-3">
													<x-label for="New" value="{{ __('New Password Password') }}" />
													<x-input id="New" class="block mt-1 w-full shadow-none" placeholder="New Password Password" type="text" name="New" />
												</div>
												<div class="col-12 col-md-6 mb-3">
													<x-label for="Confirm" value="{{ __('Confirm Password') }}" />
													<x-input id="Confirm" class="block mt-1 w-full shadow-none" placeholder="Confirm Password" type="text" name="Confirm" />
												</div>
											</div>
											<x-button class="border-0 px-4 py-2 rounded-pill text-white f-16 fw-600 bg-blue text-capitalize" style="height: 43px;letter-spacing: normal;">
												{{ __('Change Password') }}
											</x-button>
										</div>
									</div>
								</div>
							</div>
							<div id="menu2" class="tab-pane fade">
								<div class="profile-outer">
									<div class="row p-3">
										<div class="col-12 col-md-8">
											<p class="title-account">My Trip </p>
										</div>
									</div>								
									<div class="table-responsive">
									<table class="table table-borderless">
										<thead>
										<tr>
											<th>Booking ID</th>
											<th>Date</th>
											<th>Destination</th>
											<th>Status</th>                                        
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>#3933</td>
											<td>4 April, 2021</td>
											<td>lluminations at the Jardin des Plantes</td>
											<td style="color: #0C9600;">Completed</td>                                        
										</tr>    
										<tr>
											<td>#3933</td>
											<td>4 April, 2021</td>
											<td>Paris to CDG Airport </td>
											<td style="color: #EB2226;">Cancelled</td>                                        
										</tr>                                 
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</x-app-layout>

<div class="bg-white">
	<div class="container common-container py-4">
		<div class="row">
			<div class="col-12 col-md-6 pb-3 pb-md-0">
				<div>
					<p class="tour-title">Tour Packages</p>
					<p class="result-title">49 results found</p>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="sort-select">
					<label>Sort by:</label>
					<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container common-container py-4">
	<div class="row">
		<div class="col-12 col-md-5 col-lg-3">
			<div>
				<div class="white-shadow">
					<p class="f-18 fw-600 mb-0 p-3">Availability</p>
					<hr>
					<div class="calender-seaction pt-0 px-3 pb-3">
						<div class="mb-4">
							<p class="f-15 fw-500 mb-2">From</p>
							<input type="date" class="form-control"/>
						</div>
						<div class="mb-4">
							<p class="f-15 fw-500 mb-2">To</p>
							<input type="date" class="form-control"/>
						</div>
						<div class="mt-8"> 
							<button class="border-0 px-4 py-2 rounded-pill text-white f-18 fw-500 bg-blue text-capitalize w-100 h-12">
								check availability
							</button>
						</div>
					</div>
				</div>
				<div class="white-shadow mt-4">
					<p class="f-18 fw-600 mb-0 p-3">Duration</p>
					<hr>
					<div class="checkbox-seaction pt-0 px-3 pb-3">
						<div class="mb-2"> 
							<input type="checkbox" class="check-with-label" id="idinput" />
							<label class="label-for-check" for="idinput">0-3 hours</label>
						</div>
						<div class="mb-2">
							<input type="checkbox" class="check-with-label" id="idinput" />
							<label class="label-for-check" for="idinput">Full day (7+ hours)</label>
						</div>
						<div class="mb-2">
							<input type="checkbox" class="check-with-label" id="idinput" />
							<label class="label-for-check" for="idinput">Multi-day</label>
						</div>
					</div>
				</div>
				<div class="white-shadow mt-4">
					<p class="f-18 fw-600 mb-0 p-3">Categories</p>
					<hr>
					<div class="checkbox-seaction pt-0 px-3 pb-3">
						<div class="align-items-center d-flex justify-between mb-2"> 
							<div>
								<input type="checkbox" class="check-with-label" id="idinput" />
								<label class="label-for-check" for="idinput">Musuem</label>
							</div>
							<div>
								<p class="f-14 mb-0" style="color: #7E8AA0;">92</p>
							</div>
						</div>
						<div class="align-items-center d-flex justify-between mb-2"> 
							<div>
								<input type="checkbox" class="check-with-label" id="idinput" />
								<label class="label-for-check" for="idinput">Sightseeing</label>
							</div>
							<div>
								<p class="f-14 mb-0" style="color: #7E8AA0;">45</p>
							</div>
						</div>	
						<div class="align-items-center d-flex justify-between mb-2"> 
							<div>
								<input type="checkbox" class="check-with-label" id="idinput" />
								<label class="label-for-check" for="idinput">Gastronomic</label>
							</div>
							<div>
								<p class="f-14 mb-0" style="color: #7E8AA0;">21</p>
							</div>
						</div>							
					</div>
				</div>
				<div class="white-shadow mt-4">
					<p class="f-18 fw-600 mb-0 p-3">Vehicle Type</p>
					<hr>
					<div class="checkbox-seaction pt-0 px-3 pb-3">
						<div class="align-items-center d-flex justify-between mb-2"> 
							<div>
								<input type="checkbox" class="check-with-label" id="idinput" />
								<label class="label-for-check" for="idinput">LUXURY CAR (UP to 3 Pers)</label>
							</div>
							<div>
								<p class="f-14 mb-0" style="color: #7E8AA0;">92</p>
							</div>
						</div>
						<div class="align-items-center d-flex justify-between mb-2"> 
							<div>
								<input type="checkbox" class="check-with-label" id="idinput" checked/>
								<label class="label-for-check" for="idinput">LUXURY CAR (UP to 7 Pers)</label>
							</div>
							<div>
								<p class="f-14 mb-0" style="color: #7E8AA0;">45</p>
							</div>
						</div>				
					</div>
				</div>
				<div class="white-shadow mt-4">
					<p class="f-18 fw-600 mb-0 p-3">Price</p>
					<hr>
					<div class="price-seaction pt-0 px-3 pb-3">
									
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-7 col-lg-9 mt-4 mt-md-0">
			<div>
				<div class="row bg-white" style="border-radius: 20px;"> 
                    <div class="col-xl-3 col-lg-3 col-md-12 col-12 pl-0 pr-0 pr-lg-3">
                        <div class="position-relative h-100 tour-img" style="background: url('{{ asset('images/event.svg') }}') no-repeat;">                            
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-12 pl-3 pl-lg-0 py-3">
                        <div class="row row-new">
							<div class="col-xl-10 col-lg-12 col-md-12 pb-4 pb-lg-0">
								<div>
								 <p class="f-18">
									<span class="text-grays">From</span> 
									Paris to Mont-St-Michel 
									<span class="text-grays">Round-trip</span> 
									<span class="mx-2"><img src="{{ asset('images/gray-line.svg') }}"></span>
									<span><img src="{{ asset('images/multi-start.svg') }}"></span>
									<span class="text-grays fw-600">(584 reviews)</span> 
								</p>
								<p class="text-grays">With Mercedes Benz V - Class. <span style="color: #FFA432;">LUXURY CAR</span></p>
								</div>
								<div class="row col-xl-8 p-0 tour-hrs">
									<div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 col-6 pl-0">
										<div class="pair-count d-flex align-items-center">											
											<img src="{{ asset('images/Clock-black.svg') }}">
											<span class="ml-2 f-15">1h30</span>
										</div>
									</div>
									<div class="col-xl-2 col-lg-6 col-md-2 col-sm-6 col-6 pl-0">
										<div class="pair-count d-flex align-items-center">											
											<img src="{{ asset('images/bi_people.svg') }}">
											<span class="ml-2 f-15">4</span>
										</div>
									</div>	
									<div class="col-xl-2 col-lg-6 col-md-2 col-sm-6 col-6 pl-0">
										<div class="pair-count d-flex align-items-center">
											<img src="{{ asset('images/material-black.svg') }}">
											<span class="ml-2 f-15">3</span>
										</div>
									</div>																	
									<div class="col-xl-3 col-lg-6 col-md-3 col-sm-6 col-6 pl-0">
										<div class="pair-count d-flex align-items-center speedmeter">											
											<img src="{{ asset('images/speedometer-black.svg') }}">
											<span class="ml-2 f-15">90km</span>
										</div>
									</div>
								</div>
								<p class="mt-3 mb-0 text-grays">Tour Packages - <span>Round-Trip</span> </p>
							</div>
							<div class="col-xl-2 col-lg-12 col-md-12">
								<div class="d-flex flex-column h-100 justify-content-between text-center text-lg-right">
									<div class="mb-2 mb-lg-0">
										<p class="f-15 fw-600 mb-0">EUR €130</p>
										<p class="f-14 fw-500 text-grays mb-0">per person</p>
									</div>
									<div>
										<button class="bg-blue border-0 f-16 fw-500 py-2 rounded-pill text-capitalize text-white w-100">
											Book Now
										</button>
									</div>
								</div>
							</div>                                    
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<livewire:address-manager /> 	
</div>
@endsection