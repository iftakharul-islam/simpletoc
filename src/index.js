import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';

const simpletocicon = (
	<svg
		fill-rule="evenodd"
		stroke-linejoin="round"
		stroke-miterlimit="2"
		viewBox="0 0 500 500"
		xmlns="http://www.w3.org/2000/svg"
	>
	<path d="m365.983 78.248c2.72-32.415 29.921-57.908 63.029-57.908 34.91 0 63.253 28.342 63.253 63.252s-28.343 63.252-63.253 63.252v269.582c0 25.232-20.485 45.718-45.718 45.718h-313.62c-25.233 0-45.719-20.486-45.719-45.718v-292.46c0-25.233 20.486-45.718 45.719-45.718zm-245.943 324.857c-16.883 0-30.511-13.719-30.511-30.714 0-16.79 13.628-30.714 30.511-30.714 16.679 0 30.511 13.924 30.511 30.714 0 16.995-13.832 30.714-30.511 30.714zm50.851-40.952h183.063v20.476h-183.063zm-50.851-61.428c-16.883 0-30.511-13.719-30.511-30.714 0-16.79 13.628-30.714 30.511-30.714 16.679 0 30.511 13.924 30.511 30.714 0 16.995-13.832 30.714-30.511 30.714zm50.851-40.952h183.063v20.476h-183.063zm-50.851-61.428c-16.883 0-30.511-13.719-30.511-30.714 0-16.791 13.628-30.714 30.511-30.714 16.679 0 30.511 13.923 30.511 30.714 0 16.995-13.832 30.714-30.511 30.714zm50.851-40.952h183.063v20.476h-183.063zm253.007-44.649v-24.188h-24.008v-10.108h24.008v-24.008h10.229v24.008h24.008v10.108h-24.008v24.188z" />
	</svg>
);

 /**
  * Internal dependencies
  */
  import Edit from './edit';
  import save from './save';
 

registerBlockType(metadata, {
	icon: simpletocicon,
	/**
	 * @see ./edit.js
	 */
	 edit: Edit,

	 /**
	  * @see ./save.js
	  */
	 save,
 });
