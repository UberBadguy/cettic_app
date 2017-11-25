using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PickupScript : MonoBehaviour {

    public PickupType pickupType;

    public enum PickupType
    {
        Base = 1,
        Plus = 2,
        Shiny = 3
    }

	// Use this for initialization
	void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}
}
