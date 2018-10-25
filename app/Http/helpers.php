<?php 

	use Carbon\Carbon;


	if( !function_exists( 'agePatient' ) )
	{
		function agePatient($dateNaissance)
	    {
	        return date_diff(date_create($dateNaissance), date_create(date('Y-m-d')))->y;
	    }
	}

	if(!function_exists('numberToPriceFormat'))
	{
	    /**
	     * @param null $number
	     * @return string
	     */
	    function numberToPriceFormat($number = null)
	    {
	        return number_format((float)$number, 2, '.', '') . ' $';
	    }
	}

	if(!function_exists('dateToFrFormat'))
	{
	    /**
	     * Permet de formater la date vers la format françaices
	     * @param null $date
	     * @return string
	     */
	    function dateToFrFormat($date = null)
	    {
	        return \Carbon\Carbon::parse($date)->format('d / m / Y');
	    }
	}

