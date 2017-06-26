<?php
/**
 * Get Instagram Posts
 *
 * Returns an array of posts in the following format:
 * src - Image source
 * url - Link to view the image on instagram
 * date - date it was posted
 * likes - Total number of Likes
 * caption - image caption
 *
 * This function utilises Wordpress Transients to cache the request and refesh every hour.
 *
 * @param int $count Maximum number of items to return from the instagram request, Instagram limits this to 20 per request
 * @param str $resolution Change the resolution of the items to return: low_resolution, standard_resolution
 *
 * @return array
 *
 */
function get_instagram( $user_id = '414143281', $count = 20, $resolution = 'standard_resolution' ) {

	if ( get_transient( 'instagram_feed_' . $user_id ) ) {
		return get_transient( 'instagram_feed_' . $user_id );
	} else {
		$access_token = '414143281.e2a9043.6d4acb839c38488f831d826bf29d32fe';
		$instagram    = wp_remote_get( 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?access_token=' . $access_token . '&count=' . $count );
		$instagram    = json_decode( $instagram['body'] );

		$instagramPosts = [];

		foreach ( $instagram->data as $post ) {

			$instagramPosts[ (int)
			$post->created_time ] = [
				'src'     => $post->images->{$resolution}->url,
				'url'     => $post->link,
				'date'    => date( 'M j,Y', $post->created_time ),
				'likes'   => $post->likes->count,
				'caption' => $post->caption->text
			];
		}

		set_transient( 'instagram_feed_' . $user_id, $instagramPosts, HOUR_IN_SECONDS );

		// newest first
		krsort( $instagramPosts );

		return $instagramPosts;
	}
}