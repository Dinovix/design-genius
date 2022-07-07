<script setup>
import SiteLayout from "./Website/Layouts/SiteLayout.vue";

let articles = [
	{
		id:1,
		title: "Why you should choose DesignGenius SAS as your go-to company for product design and development",
		image: "/img/dg-team.png",
		author: "Design Genius",
		category: "PRODUCT DESIGN",
		content: `Product design and development procedures are complex. There quire a lot of attention to
detail and mastery of technological parameters else the entire product will be ruined.
Consequently, finding the right technicians for your design and development work must be done
with a lot of precaution.
DesignGenius SAS stands out as the best PanAfrican Design company because of the
following reasons:


At DesignGenius SAS multiple streams of knowledge exist. Our product design and
development prowess is a result of efficient and practically tested team work. These
combination of "genius" ideas and work ethic is the reason why you should trust us with your
project.
With the wave of technology traveling quickly across the world, the African market is in dire
need of innovative products and machinery at every level of society.
Unfortunately, the cost of importing and maintaining foreign tech products and machinery
leaves individuals and companies vulnerable to producing low quality services.Through our low
-cost-high-tech approach, DesignGenius Groupe helps companies enjoy high tech products at
a very affordable cost. Talk about a beacon of hope to you and your business.
In production chains across the world today, there's very little focus on product re-innovation. A
business' inability to re-innovate a product or design in this fast-changing world will see them
become obsolete and spending more on new machines. You don't want to be"classified" under
that category. Trusting DesignGenius' re-innovative design model is the best decision you'll
make for your business. This model gives you the ability to produce high quality products and
adapt to daily tech innovations without stretching your technical operation budget.
Trusting DesignGenius SAS with your product design and development is trusting a new and
innovative approach to technology. It's the decision you must make to day to stay relevant in
your niche`,
		created_at: new Date().getUTCDay(),
		tags: [
			"bestChoice",
			"productDesign",
			"designGenius237"
		]
	},
	// {
	// 	title: "",
	// 	image: "",
	// 	author: "",
	// 	category: "",
	// 	content: "",
	// 	created_at: new Date().getUTCDay(),
	// },
]

let article = articles.find(a => a.id === 1);
</script>

<template>

	<SiteLayout :title="article.title">


	</SiteLayout>
</template>


<style>

</style>
