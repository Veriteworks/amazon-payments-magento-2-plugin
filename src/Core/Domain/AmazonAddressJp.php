<?php
/**
 * Copyright 2016 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */
namespace Amazon\Core\Domain;

class AmazonAddressJp extends AmazonAddress
{
    /**
     * @param array $address
     * @param AmazonNameFactory $addressNameFactory
     */
    public function __construct(array $address, AmazonNameFactory $addressNameFactory)
    {
        parent::__construct($address, $addressNameFactory);
        $this->processValues();
    }

    /**
     * @return void
     */
    private function processValues()
    {
        $line1 = (string) $this->getLine(1);
        $line2 = (string) $this->getLine(2);
        $line3 = (string) $this->getLine(3);

        if ($this->city == '') {
            $this->city = $line1;
            $this->lines[] = $line2;

            if ($line3) {
                $this->lines[] = $line3;
            }
        } else {
            $this->lines[] = $line2 . ' ' . $line3;
        }
    }

}
