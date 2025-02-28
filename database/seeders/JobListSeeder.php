<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\JobList;

class JobListSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $companies = Company::whereIn('name', [
            'Tech Solutions',
            'GreenTech Innovations',
            'Creative Studios',
            'HealthFirst Solutions',
            'Global Finance Group',
            'Quantum Research Labs'
        ])->get()->keyBy('name');

        $jobs = [
            'Tech Solutions' => [
                [
                    'title' => 'Software Engineer',
                    'position_type' => 'Remote',
                    'salary' => '$100,000 - $120,000',
                    'location' => 'Silicon Valley, CA',
                    'description' => 'Develop, test, and maintain software applications utilizing a variety of programming languages and frameworks. The ideal candidate will collaborate with cross-functional teams to design and implement innovative solutions to complex problems. Responsibilities include writing clean, efficient code, conducting code reviews, troubleshooting and debugging applications, and participating in agile development processes. Must have strong knowledge of software development principles, experience with cloud platforms, and excellent problem-solving skills. This position offers opportunities for professional growth and the chance to work on cutting-edge technologies.',
                ],
                [
                    'title' => 'Project Manager',
                    'position_type' => 'In-Person',
                    'salary' => '$90,000 - $110,000',
                    'location' => 'Silicon Valley, CA',
                    'description' => 'Oversee project timelines, budgets, and resources to ensure successful delivery of technology initiatives. The project manager will be responsible for defining project scope, creating detailed project plans, managing stakeholder expectations, and leading diverse teams through the project lifecycle. Key skills include strong communication abilities, risk management expertise, and proficiency with project management methodologies and tools. The ideal candidate will have a track record of delivering complex projects on time and within budget while maintaining high-quality standards and team morale. Experience in the tech industry and relevant certifications are highly desired.',
                ],
            ],
            'GreenTech Innovations' => [
                [
                    'title' => 'Environmental Engineer',
                    'position_type' => 'In-Person',
                    'salary' => '$85,000 - $105,000',
                    'location' => 'Portland, OR',
                    'description' => 'Design and implement sustainability projects that reduce environmental impact and promote green technologies. The environmental engineer will conduct assessments, analyze data, and develop solutions for complex environmental challenges. Responsibilities include creating detailed reports, ensuring compliance with environmental regulations, collaborating with cross-functional teams, and presenting findings to stakeholders. The ideal candidate will have expertise in environmental science, engineering principles, and sustainability practices. This role requires a combination of technical knowledge and practical problem-solving skills to develop innovative approaches to environmental conservation and resource efficiency.',
                ],
                [
                    'title' => 'Marketing Specialist',
                    'position_type' => 'Remote',
                    'salary' => '$60,000 - $80,000',
                    'location' => 'Remote',
                    'description' => 'Develop and execute marketing campaigns focused on promoting sustainable technologies and environmental initiatives. The marketing specialist will create compelling content, manage social media accounts, coordinate email marketing efforts, and analyze campaign performance metrics. Key responsibilities include conducting market research, identifying target audiences, collaborating with design teams, and optimizing marketing strategies based on data insights. The ideal candidate will have a strong understanding of digital marketing principles, excellent writing skills, and a passion for environmental sustainability. Experience with marketing automation tools, SEO techniques, and analytics platforms is highly desired for this position.',
                ],
            ],
            'Creative Studios' => [
                [
                    'title' => 'Graphic Designer',
                    'position_type' => 'In-Person',
                    'salary' => '$70,000 - $90,000',
                    'location' => 'New York, NY',
                    'description' => 'Create visually appealing designs for various media including print, digital, and interactive platforms. The graphic designer will develop concepts, produce layouts, and refine designs based on client feedback and brand guidelines. Responsibilities include creating illustrations, selecting typography, editing images, and preparing files for production. The ideal candidate will have a strong portfolio demonstrating creativity, technical skill, and versatility across different design styles and mediums. Proficiency with industry-standard design software is essential, along with excellent communication skills and the ability to translate client needs into effective visual solutions. This position requires both artistic talent and practical design knowledge.',
                ],
            ],
            'HealthFirst Solutions' => [
                [
                    'title' => 'Healthcare IT Specialist',
                    'position_type' => 'In-Person',
                    'salary' => '$95,000 - $115,000',
                    'location' => 'Chicago, IL',
                    'description' => 'Maintain healthcare IT systems ensuring security, reliability, and compliance with industry regulations. The healthcare IT specialist will troubleshoot technical issues, implement software updates, manage database systems, and provide technical support to medical staff. Key responsibilities include configuring electronic health record systems, establishing data backup protocols, conducting security audits, and developing IT policies for healthcare environments. The ideal candidate will have in-depth knowledge of healthcare information systems, experience with HIPAA compliance, and strong problem-solving abilities. This role requires a unique combination of technical expertise and understanding of healthcare operations to support critical medical systems and protect sensitive patient information.',
                ],
            ],
            'Global Finance Group' => [
                [
                    'title' => 'Financial Analyst',
                    'position_type' => 'In-Person',
                    'salary' => '$85,000 - $105,000',
                    'location' => 'Boston, MA',
                    'description' => 'Conduct comprehensive financial analyses to support investment decisions and business strategy development. The financial analyst will gather and interpret financial data, create detailed financial models, perform valuation analyses, and prepare reports for management. Responsibilities include monitoring market trends, analyzing company performance metrics, forecasting financial outcomes, and identifying investment opportunities. The ideal candidate will have strong quantitative skills, proficiency with financial modeling techniques, and the ability to translate complex financial information into actionable insights. Knowledge of accounting principles, financial markets, and valuation methodologies is essential for success in this role. Experience with financial analysis software and advanced Excel skills are required.',
                ],
                [
                    'title' => 'Risk Management Specialist',
                    'position_type' => 'Remote',
                    'salary' => '$90,000 - $110,000',
                    'location' => 'Toronto, ON',
                    'description' => 'Identify, assess, and mitigate financial risks through comprehensive analysis and strategic planning. The risk management specialist will develop risk assessment frameworks, conduct scenario analyses, monitor risk exposures, and implement risk control measures. Key responsibilities include analyzing market, credit, and operational risks, developing risk models, creating risk reports, and collaborating with various departments to integrate risk management practices. The ideal candidate will have strong analytical abilities, excellent problem-solving skills, and a thorough understanding of financial markets and risk management principles. This position requires the ability to anticipate potential risks and develop proactive strategies to protect the organizations financial health and reputation.',
                ],
                [
                    'title' => 'Wealth Management Advisor',
                    'position_type' => 'In-Person',
                    'salary' => '$100,000 - $150,000 + Commission',
                    'location' => 'Boston, MA',
                    'description' => 'Provide comprehensive financial planning and investment advice to high-net-worth individuals and families. The wealth management advisor will assess client financial goals, develop personalized investment strategies, monitor portfolio performance, and adjust plans as needed. Responsibilities include conducting regular client meetings, analyzing investment opportunities, coordinating with tax and estate planning professionals, and building long-term client relationships. The ideal candidate will have excellent interpersonal skills, in-depth knowledge of investment products, and the ability to explain complex financial concepts in understandable terms. This role requires a combination of financial expertise, relationship management abilities, and ethical judgment to help clients achieve their financial objectives.',
                ],
                [
                    'title' => 'FinTech Solutions Developer',
                    'position_type' => 'Remote',
                    'salary' => '$110,000 - $130,000',
                    'location' => 'Toronto, ON',
                    'description' => 'Design and develop innovative financial technology solutions that enhance financial services delivery and customer experience. The FinTech developer will create secure, efficient applications for payments, trading, banking, and investment management. Key responsibilities include writing clean, efficient code, integrating with financial APIs, implementing security protocols, and collaborating with product and design teams. The ideal candidate will have strong programming skills, experience with financial systems, and knowledge of regulatory requirements in the financial sector. This position requires a unique combination of technical expertise and understanding of financial processes to create technologies that address real-world financial challenges and opportunities.',
                ],
            ],
            'Quantum Research Labs' => [
                [
                    'title' => 'Quantum Computing Researcher',
                    'position_type' => 'In-Person',
                    'salary' => '$120,000 - $150,000',
                    'location' => 'Austin, TX',
                    'description' => 'Conduct cutting-edge research in quantum computing algorithms, quantum error correction, and quantum information theory. The quantum computing researcher will design and implement quantum algorithms, analyze quantum systems, publish research findings, and collaborate with international research partners. Responsibilities include developing quantum circuit designs, simulating quantum processes, proposing new quantum computing approaches, and contributing to grant applications. The ideal candidate will have an advanced degree in physics, computer science, or a related field, with specialized knowledge of quantum mechanics and quantum information science. This position offers the opportunity to work at the forefront of quantum computing research and contribute to groundbreaking technological advancements.',
                ],
                [
                    'title' => 'Artificial Intelligence Engineer',
                    'position_type' => 'Remote',
                    'salary' => '$115,000 - $140,000',
                    'location' => 'Toronto, ON',
                    'description' => 'Develop advanced artificial intelligence systems using machine learning, deep learning, and natural language processing techniques. The AI engineer will design neural network architectures, implement learning algorithms, train and optimize AI models, and evaluate system performance. Key responsibilities include creating data pipelines, developing feature extraction methods, implementing AI models in production environments, and staying current with the latest AI research. The ideal candidate will have strong programming skills, expertise in AI frameworks, and experience with large-scale data processing. This role requires both theoretical knowledge and practical implementation skills to create AI solutions that solve complex real-world problems across various domains.',
                ],
                [
                    'title' => 'Robotics Systems Engineer',
                    'position_type' => 'In-Person',
                    'salary' => '$110,000 - $135,000',
                    'location' => 'Austin, TX',
                    'description' => 'Design, develop, and test robotic systems combining mechanical components, electronic hardware, and control software. The robotics systems engineer will create robot architectures, implement control algorithms, integrate sensors and actuators, and optimize robot performance. Responsibilities include developing real-time software, conducting simulation studies, troubleshooting hardware-software interactions, and documenting system designs. The ideal candidate will have a strong background in control systems, embedded programming, mechanical design, and sensor integration. This position requires interdisciplinary knowledge and practical problem-solving skills to create robust robotic systems that can operate reliably in diverse environments and applications.',
                ],
                [
                    'title' => 'Emerging Technologies Strategist',
                    'position_type' => 'Remote',
                    'salary' => '$125,000 - $155,000',
                    'location' => 'Austin, TX',
                    'description' => 'Identify and evaluate emerging technologies to guide research priorities and innovation strategies. The emerging technologies strategist will assess technological trends, conduct feasibility studies, develop technology roadmaps, and advise leadership on strategic technology investments. Key responsibilities include monitoring scientific advancements, analyzing potential market applications, coordinating proof-of-concept projects, and fostering relationships with academic and industry partners. The ideal candidate will have a strong technical background combined with business acumen and strategic thinking capabilities. This role requires the ability to bridge the gap between scientific research and practical applications, identifying technologies with the potential to create significant impact and competitive advantage.',
                ],
            ],
        ];

        foreach ($jobs as $companyName => $jobList) {
            if (isset($companies[$companyName])) {
                $companies[$companyName]->jobLists()->createMany($jobList);
            }
        }
    }
}
