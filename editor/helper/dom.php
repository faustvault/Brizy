<?php

class Brizy_Editor_Helper_Dom extends Brizy_Editor_Helper_DomTag {

	/**
	 * @return Brizy_Editor_Helper_DomTag
	 * @throws Brizy_Editor_Exceptions_NotFound
	 */
	public function get_head() {
		$tags = $this->get_tags( '/(<head(.*?)<\/head>)/is' );

		if ( empty( $tags ) ) {
			throw new Brizy_Editor_Exceptions_NotFound( 'Body tag cannot be found' );
		}

		return $tags[0];
	}


	/**
	 * @return Brizy_Editor_Helper_DomTag
	 * @throws Brizy_Editor_Exceptions_NotFound
	 */
	public function get_body() {
		$tags = $this->get_tags( '/(<body(.*?)<\/body>)/is' );

		if ( empty( $tags ) ) {
			throw new Brizy_Editor_Exceptions_NotFound( 'Body tag cannot be found' );
		}

		return $tags[0];
	}


	/**
	 * Return the tag html
	 *
	 * @return string
	 */
	protected function get_html() {
		return $this->get_tag();
	}

	/**
	 * @todo: Move this somewhere else..
	 *
	 * @param array $tags
	 * @param $attr
	 *
	 * @return array
	 */
	public function get_attributes( array $tags, $attr ) {
		$list = array();

		foreach ( $tags as $tag ) {
			$link = trim( $tag->get_attr( $attr ) );

			if ( empty( $link ) ) {
				continue;
			}

			$list[] = $link;
		}

		return $list;
	}

}