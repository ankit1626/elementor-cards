<?php
/**
 * This class extends the Elementor Widget's Class to create custom widget.
 *
 * @package Elementor_Cards
 */

/**
 * This class extends the Elementor Widget's Class to create custom widget.
 */
class Card_Widget extends \Elementor\Widget_Base {
	/**
	 * This function will return the widget unique name.
	 */
	public function get_name() {
		return 'card_widget';
	}
	/**
	 * This function will return the widget title.
	 */
	public function get_title() {
		return esc_html__( 'Cards', 'elementor-cards' );
	}
	/**
	 * This function will return the widget icon.
	 */
	public function get_icon() {
		return 'fa-bootstrap';
	}
	/**
	 * This function will return the widget categories.
	 */
	public function get_categories() {
		return array( 'basic' );
	}
	/**
	 * This function will register the keywords which will allow the widget to be shown in search results.
	 */
	public function get_keywords() {
		return array( 'card', 'cards', 'bootstrap' );
	}
	/**
	 * This function get styles for our widget.
	 */
	public function get_style_depends() {
		return array( 'bootstrap-css', 'elementor-cards-css' );
	}
	/**
	 * This function registers controls for our widget.
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'card_section',
			array(
				'label' => esc_html__( 'Cards', 'elementor-cards' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			),
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'card_title',
			array(
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => esc_html__( 'Title', 'elementor-cards' ),
				'placeholder' => esc_html__( 'Enter your title', 'elementor-cards' ),
				'dynamic'     => array(
					'active' => true,
				),
			)
		);
		$repeater->add_control(
			'card_description',
			array(
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'label'       => esc_html__( 'Description', 'elementor-cards' ),
				'placeholder' => esc_html__( 'Description', 'elementor-cards' ),
				'dynamic'     => array(
					'active' => true,
				),
			)
		);
		$repeater->add_control(
			'card_logo',
			array(
				'label'   => esc_html__( 'Choose Image', 'elementor-cards' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				'dynamic' => array(
					'active' => true,
				),
			)
		);
		$repeater->add_control(
			'website_link',
			array(
				'label'       => esc_html__( 'Link', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'options'     => false,
				'default'     => array(
					'url' => '#',
				),
				'label_block' => true,
			)
		);
		$this->add_control(
			'Cards',
			array(
				'label'       => esc_html__( 'Card', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => 'Card',
				'description' => 'Create as many cards as you want',
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'card_style_section',
			array(
				'label' => esc_html__( 'Cards', 'elementor-cards' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			),
		);
		$this->add_control(
			'header_color',
			array(
				'label'     => esc_html__( 'Header Background Color', 'elementor-cards' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#2f3c68',
				'selectors' => array(
					'{{WRAPPER}} .card-header' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'body_color',
			array(
				'label'     => esc_html__( 'Body Background Color', 'elementor-cards' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .card-body' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'icon_color',
			array(
				'label'     => esc_html__( 'Icon Background Color', 'elementor-cards' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#00000',
				'selectors' => array(
					'{{WRAPPER}} .icon' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'font_family',
			array(
				'label'     => esc_html__( 'Font family for card description', 'elementor-cards' ),
				'type'      => \Elementor\Controls_Manager::FONT,
				'default'   => "'Open Sans', sans-serif",
				'selectors' => array(
					'{{WRAPPER}} .card-text' => 'font-family: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'font_family_title',
			array(
				'label'     => esc_html__( 'Font family for card title', 'elementor-cards' ),
				'type'      => \Elementor\Controls_Manager::FONT,
				'default'   => "'Open Sans', sans-serif",
				'selectors' => array(
					'{{WRAPPER}} h3' => 'font-family: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Card Title Color', 'elementor-cards' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'text_color',
			array(
				'label'     => esc_html__( 'Card Description Color', 'elementor-cards' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} .card-text' => 'color: {{VALUE}}',
				),
			)
		);
	}

	/**
	 * This function is responsible for displaying widget content in front-end.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$cards    = $settings['Cards'];
		?>
		<div class="cards-container">
			<div class="row">
			<?php
			foreach ( $cards as $card ) {
				?>
					<div class="col">
						<div class="card-deck">
							<a target="_blank" href="<?php echo esc_attr( $card['website_link']['url'] ); ?>" class="card">
								<div class="card-header"></div>
								<div class="icon">
									<img src="<?php echo esc_attr( $card['card_logo']['url'] ); ?>" style="width:80%;height:auto;display:block;margin:auto">
								</div>
								<div class="card-body">
									<h3><?php echo esc_html( $card['card_title'] ); ?></h3>
									<p class="card-text"><?php echo esc_html( $card['card_description'] ); ?></p>
								</div>
							</a>
						</div>
					</div>
				<?php
			}
			?>
			</div>
		</div>
		<?php
	}
	/**
	 * This function is responsible for displaying widget content in elementor editor.
	 */
	protected function content_template() {
		?>
		<div class="cards-container">
			<div class="row">


		<# if( settings.Cards.length ) { #>
			<# settings.Cards.forEach((card) => { #>
				<div class="col">
					<div class="card-deck">
				<a target="_blank" href="{{card.website_link}}" class="card">
				<#
		if ( card.card_logo.url ) {
			var image = {
				id: card.card_logo.id,
				url: card.card_logo.url,
				size: card.card_logo.image_size,
				dimension: card.card_logo.image_custom_dimension,
				model: view.getEditModel()
			};

			var image_url = elementor.imagesManager.getImageUrl( image );

			if ( ! image_url ) {
				return;
			}
		}
		#>
		<div class="card-header"></div>
		<div class="icon"><img src="{{image_url}}" style="width:80%;height:auto;display:block;margin:auto"></div>
				<div class="card-body">
					<h3>{{{card.card_title}}}</h3>
					<p class="card-text">{{{card.card_description}}}</p>
				</div>
	</a>
				</div>
			</div>
			<# }); #>
			
		<# } #>
		
		</div>
		</div>
		<?php
	}
}
