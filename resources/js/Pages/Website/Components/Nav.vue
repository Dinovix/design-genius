<script setup>
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
	canLogin: {
		type: Boolean,
		default: route().has('login'),
	},
	canRegister: {
		type: Boolean,
		default: route().has('register'),
	},
	
});


</script>

<template>
	<nav :class="{ 'scrolled': (!view.atTopOfPage || !route().current('web.home')) }" class="fixed z-20 w-full animated  transition duration-300">
			<div class="container m-auto px-6 md:px-12 lg:px-6">
				<div class="flex flex-wrap items-center justify-between py-6 gap-2 md:py-0 md:gap-0">
					<div class="w-full flex justify-between lg:w-auto">
						<a href="#" aria-label="logo">
							<img src="img/logo.png" class="w-24" alt="Design Genius logo">
						</a>

						<button aria-label="humburger" id="hamburger" class="relative w-10 h-10 -mr-2 lg:hidden">
							<div aria-hidden="true" id="line"
								class="inset-0 w-6 h-0.5 m-auto rounded bg-white transition duration-300"></div>
							<div aria-hidden="true" id="line2"
								class="inset-0 w-6 h-0.5 mt-2 m-auto rounded bg-white transition duration-300"></div>
						</button>
					</div>

					<div hidden
						class="w-full bg-white md:space-y-0 md:p-0 md:flex-nowrap md:bg-transparent lg:w-auto lg:flex">
						<div class="block w-full lg:items-center lg:flex">
							<ul
								class="space-y-6 pb-6 tracking-wide font-medium text-gray-100 lg:pb-0 lg:pr-6 lg:items-center lg:flex lg:space-y-0">

								<li>
									<Link :href="route('web.home')" class="text-sm text-white font-semibold block md:px-3">
									Home
									</Link>

								</li>
								<li>
									<Link :href="route('web.services')" class="text-sm text-white font-semibold block md:px-3">
									Services
									</Link>

								</li>
								<li>
									<Link :href="route('web.products')" class="text-sm text-white font-semibold block md:px-3">
									Products
									</Link>

								</li>
								<li>
									<Link :href="route('web.blog')" class="text-sm text-white font-semibold block md:px-3">
									Blog
									</Link>

								</li>
								<li>
									<a href="https://academy.mydesigngenius.com" target="_blank"
									class="text-sm text-white font-semibold block md:px-3">
									Academy
									</a>

								</li>
								<li>
									<Link :href="affiliates" class="text-sm text-white font-semibold block md:px-3">
									Affiliates
									</Link>

								</li>

							</ul>

							<ul
								class="border-t space-y-2   lg:space-y-0 lg:space-x-2 lg:pt-0 lg:pl-1 lg:border-t-0 lg:border-l lg:items-center md:flex">
								<div class="hidden   sm:flex scale-90">


									<li v-if="$page.props.user" >
										<Link :href="route('profile')"
										class="text-sm text-gray-700 underline">
										<span>
											{{ $page.props.user.name }}
										</span>
										</Link>
									</li>


									<template v-else>

										<li >
											<Link :href="route('login')"
												class="inline-block w-full py-1 px-4 rounded-lg text-center transition border border-transparent hover:bg-red-600 text-white font-semibold active:bg-red-200 focus:bg-red-100 active:border-red-600 sm:w-max">
												<span class="-block ">
													Login
												</span>
											</Link>
										</li>
										<li >
										<Link   :href="route('register')"
											class="inline-block w-full py-1 px-4 rounded-lg text-center transition bg-white hover:bg-red-600 hover:text-white active:bg-red-200 focus:bg-red-100 sm:w-max">
											<span class="block  ">
												Register
											</span>
										</Link>
										</li>
									</template>
								</div>



							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
</template>

<script >

export default  {
	data () {
		return {
			view: {
				atTopOfPage: true
			}
		}
	},

	// a beforeMount call to add a listener to the window
	beforeMount () {
		window.addEventListener('scroll', this.handleScroll);
	},

	methods: {
		// the function to call when the user scrolls, added as a method
		handleScroll(){
			// when the user scrolls, check the pageYOffset
			if(window.pageYOffset>10){
				// user is scrolled
				if(this.view.atTopOfPage) this.view.atTopOfPage = false
			}else{
				// user is at top of page
				if(!this.view.atTopOfPage) this.view.atTopOfPage = true
			}
		}
	}
}
</script>
