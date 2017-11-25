using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerScript : MonoBehaviour {

    public Rigidbody2D rbody;
    GameManager gameManager;
    // Use this for initialization
    void Start () {
        rbody = this.GetComponent<Rigidbody2D>();
        gameManager = GameObject.FindGameObjectWithTag("GameManager").GetComponent<GameManager>();

    }

    // Update is called once per frame
    void Update() {

        if (Input.GetButtonDown("Jump"))
        {
            rbody.velocity = new Vector2(rbody.velocity.x, gameManager.jumpSpeed );
        }
        
        rbody.velocity = new Vector2(gameManager.playerSpeed * Input.GetAxis("Horizontal"), rbody.velocity.y);

    }

    private void OnTriggerEnter2D(Collider2D c)
    {
        if (c.gameObject.tag.Equals("Pickup"))
        {
            Destroy(c.gameObject);
            gameManager.AddScore(c.GetComponent<PickupScript>().pickupType);
        }
    }
}
