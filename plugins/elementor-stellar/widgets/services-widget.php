<?php

class Elementor_Services_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'servicesstellar';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Services Stellar', 'plugin-name' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-bath';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


        $this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor-stellar' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default title', 'elementor-stellar' ),
				'placeholder' => __( 'Type your title here', 'elementor-stellar' ),
			]
		);

        $this->add_control(
			'url',
			[
				'label' => __( 'URL', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'plugin-name' ),
			]
		);

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'service_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'service_icon',
			[
				'label' => __( 'Icon Class', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'show_label' => true,
			]
		);

		$this->add_control(
			'service',
			[
				'label' => __( 'Services', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ service_title }}}',
			]
		);


        $this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

        ?>
	<section id="first" class="main special">
								<header class="major">
									<h2><?php echo $settings['title']; ?></h2>
								</header>
								<ul class="features">

                                <?php $services = $settings['service']; 
                                foreach($services as $service){ ?>
                                    <li>
										<span class="<?php echo $service['service_icon']; ?>"></span>
										<h3><?php echo $service['service_title']; ?></h3>
										<p><?php echo $service['service_content']; ?></p>
									</li>
                                <?php } ?>
								</ul>
								<footer class="major">
									<ul class="actions special">
										<li><a href="<?php echo $settings['url']; ?>" class="button">Learn More</a></li>
									</ul>
								</footer>
							</section>
        <?php

	}

}


